document.body.addEventListener('submit', async function (e) {
    let form = e.target;
    if (!form.classList.contains('async-form')) return;

    e.preventDefault();

    let submitButton = form.querySelector('button[type=submit]');
    let oldSubmitMessage = submitButton?.value || submitButton?.textContent;

    submitButton?.setAttribute('disabled', 'disabled');
    submitButton?.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Lädt...';

    form.querySelectorAll('.form-control, .form-check-input').forEach(el => el.classList.remove('is-invalid'));

    let action = form.getAttribute('action');
    let formData = new FormData(form);
    let method = form.getAttribute('method') || "post";
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        let response = await fetch(action, {
            method: method,
            body: formData,
            headers: { 'X-CSRF-TOKEN': csrfToken }
        });

        let result = await response.json();

        submitButton?.value = oldSubmitMessage;
        submitButton?.textContent = oldSubmitMessage;

        if (result.redirect) document.location.href = result.redirect;
    } catch (error) {
        let data = await error.json();
        let errors = data.errors;

        if (!errors) return;

        for (let field in errors) {
            if (!errors.hasOwnProperty(field)) continue;
            let message = errors[field][0];
            let inputField = document.getElementById(field);

            if (inputField.type === 'checkbox') {
                inputField.closest('.form-check').querySelector('.form-check-input').classList.add('is-invalid');
                inputField.closest('.form-check').querySelector('.invalid-feedback').textContent = message;
            } else {
                inputField.closest('.form-group').querySelector('.form-control').classList.add('is-invalid');
                inputField.closest('.form-group').querySelector('.invalid-feedback').textContent = message;
            }
        }
    }
});
