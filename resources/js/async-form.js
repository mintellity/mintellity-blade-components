document.body.addEventListener('submit', async function (e) {
    let form = e.target;

    if (!form.classList.contains('ajax-form'))
        return;

    e.preventDefault();

    let submitButton = form.querySelector('button[type=submit]');
    let originalButtonLabel = null;

    if (submitButton) {
        originalButtonLabel = submitButton?.value || submitButton?.textContent;

        submitButton?.setAttribute('disabled', 'disabled');
        submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Lädt...';
    }

    // Remove all error messages
    form.querySelectorAll('.form-control, .form-check-input').forEach(el => el.classList.remove('is-invalid'));

    const method = form.getAttribute('method') || "post";
    const action = form.getAttribute('action');
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
            if (data.redirect) {
                window.location.replace(data.redirect);
                return Promise.resolve();
            }

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
            submitButton.removeAttribute('disabled');
            submitButton.value = originalButtonLabel;
            submitButton.textContent = originalButtonLabel;
        });

    function setFieldError(field, message) {
        let inputField = document.getElementById(field);

        if (inputField.type === 'checkbox') {
            inputField.closest('.form-check').querySelector('.form-check-input').classList.add('is-invalid');
            inputField.closest('.form-check').querySelector('.invalid-feedback').textContent = message;
        } else {
            inputField.closest('.form-group').querySelector('.form-control').classList.add('is-invalid');
            inputField.closest('.form-group').querySelector('.invalid-feedback').textContent = message;
        }
    }
});
