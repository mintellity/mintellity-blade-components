/**
 * This script is used to submit forms via AJAX.
 *
 * To use this script, add the class "ajax-form" to the form element.
 */
document.body.addEventListener('submit', function (e) {
    let form = e.target;

    if (!form.classList.contains('ajax-form'))
        return;

    e.preventDefault();

    let submitButton = form.querySelector('button[type=submit]');

    submit(form, submitButton);
});

/**
 * This script is used to submit forms via AJAX.
 *
 * To use this script, add the class "ajax-button" and data-form with the form id to any button element.
 */
document.addEventListener('click', function (e) {
    let submitButton = e.target;

    if (!submitButton.classList.contains('ajax-button'))
        return;

    e.preventDefault();

    let form = submitButton.dataset.form;
    form = document.getElementById(String(form));

    submit(form, submitButton);
});

/**
 * Submits the form via AJAX.
 * - Shows validation errors if there are any.
 * - Redirects the user if the response contains a redirect key.
 * - Disables the submit button while the request is being processed.
 *
 * @param form
 * @param submitButton
 */
function submit(form, submitButton) {
    let originalButtonLabel = null;
    let disableButtonOnSubmit = form.getAttribute('data-disable-button-on-submit') === 'true';

    // Set button label to loading state, remember original label
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

    fetch(String(action), {
        method: method,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'x-requested-with': 'XMLHttpRequest'
        },
        body: formData
    })
        .then(async (response) => {
            // If response not 422 (Validation errors) or 200 (redirect), cancel
            if (response.status !== 422 && response.status !== 200)
                return Promise.reject(response);

            // If response is a file, download it
            if (response.headers.get('Content-Disposition')) {
                const data = await response.blob();
                const url = URL.createObjectURL(data);
                const a = document.createElement('a');
                a.href = url;
                a.download = response.headers.get('Content-Disposition').split('filename=')[1];
                a.click();
                URL.revokeObjectURL(url);
                return Promise.resolve();
            }

            const data = await response.json();

            // If response data contains the redirect key, redirect the user
            if (data.redirect) {
                window.location.replace(data.redirect);
                return Promise.resolve();
            }

            // If response data contains errors, show them
            if (data.errors) {
                let errors = data.errors;

                for (let field in errors) {
                    if (!errors.hasOwnProperty(field))
                        continue;

                    setFieldError(field, errors[field].join('<br>'));
                }

                return Promise.resolve();
            }

            return Promise.reject(data);
        })
        .catch((reason) => console.warn(reason))
        .finally(() => {
            if (submitButton) {
                submitButton.removeAttribute('disabled');
                submitButton.value = originalButtonLabel;
                submitButton.textContent = originalButtonLabel;
            }
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
}
