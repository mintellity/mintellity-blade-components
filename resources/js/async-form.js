document.body.addEventListener('submit', async function (e) {
    let form = e.target;

    if (!form.classList.contains('ajax-form'))
        return;

    e.preventDefault();

    let submitButton = form.querySelector('button[type=submit]');
    let oldSubmitMessage = submitButton?.value || submitButton?.textContent;

    if (!submitButton)
        return;

    submitButton?.setAttribute('disabled', 'disabled');
    submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Lädt...';

    form.querySelectorAll('.form-control, .form-check-input').forEach(el => el.classList.remove('is-invalid'));

    let action = form.getAttribute('action');
    let formData = new FormData(form);
    let method = form.getAttribute('method') || "post";
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(action, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'x-requested-with': 'XMLHttpRequest'
        },
        body: formData
    })
        .then((response) => {
            console.log('1', response.status)
            // If response not 422, cancel
            if (response.status !== 422)
                return Promise.reject();
            else
                return response.json()
        })
        .then((data) => {
            console.log('2')
            if (data.redirect) {
                document.location.href = data.redirect;
                return Promise.reject();
            }

            let errors = data.errors;

            if (!errors)
                return Promise.reject();

            for (let field in errors) {
                if (!errors.hasOwnProperty(field))
                    continue;

                setFieldError(field, errors[field].join('<br>'));
            }
        })
        .catch()
        .finally(() => {
            submitButton.removeAttribute('disabled');
            submitButton.value = oldSubmitMessage;
            submitButton.textContent = oldSubmitMessage;
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
