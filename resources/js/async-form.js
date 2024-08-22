/**
 * This script is used to submit forms via AJAX.
 *
 * To use this script, add the class "ajax-form" to the form element.
 */
document.body.addEventListener('submit', async function (e) {
    let form = e.target;

    if (!form.classList.contains('ajax-form'))
        return;

    e.preventDefault();

    // Set button label to loading state, remember original label
    let submitButton = form.querySelector('button[type=submit]');
    let originalButtonLabel = null;
    let disableButtonOnSubmit = form.getAttribute('data-disable-button-on-submit') === 'true';

    if (submitButton) {
        originalButtonLabel = submitButton?.value || submitButton?.textContent;

        disableButtonOnSubmit && submitButton?.setAttribute('disabled', 'disabled');
        submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Lädt...';
    }

    // Remove all error messages
    form.querySelectorAll('.form-control, .form-check-input').forEach(el => el.classList.remove('is-invalid'));

    // Collect form data
    const method = form.getAttribute('method') || "post";
    const action = form.getAttribute('action') || window.location.href;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData(form);

    fetch(action, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'x-requested-with': 'XMLHttpRequest'
        },
        body: formData
    })
        .then((response) => {
            // If response not 422 (Validation errors) or 200 (redirect), cancel
            if (response.status !== 422 && response.status !== 200)
                return Promise.reject(response);
            else
                return response.json()
        })
        .then((data) => {
            // Redirect user if redirect key is present
            if (data.redirect) {
                window.location.replace(data.redirect);
                return Promise.resolve();
            }

            // Set field errors if there are any
            let errors = data.errors;

            if (!errors)
                return Promise.resolve();

            for (let field in errors) {
                if (!errors.hasOwnProperty(field))
                    continue;

                setFieldError(field, errors[field].join('<br>'));
            }
        })
        .catch((reason) => console.warn(reason))
        .finally(() => {
            // Reset button state
            submitButton.removeAttribute('disabled');
            submitButton.value = originalButtonLabel;
            submitButton.textContent = originalButtonLabel;
        });

    /**
     * Sets a field error message
     *
     * @param field
     * @param message
     */
    function setFieldError(field, message) {
        let inputField = document.getElementById(field);
        inputField?.classList.add('is-invalid');

        let messageContainers = inputField
            ?.closest('.invalid-feedback-group')
            ?.getElementsByClassName('invalid-feedback');

        Array.from(messageContainers ?? [])
            .forEach(function (el) {
                el.innerHTML = message;
            });
    }
});
