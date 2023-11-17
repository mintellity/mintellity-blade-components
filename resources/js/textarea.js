$(document).ready(function () {
    const textarea = $('textarea.dynamic-height');

    textarea.each(function () {
        $(this).parent().attr('data-replicated-value', $(this).val());
    })

    textarea.on('input', function () {
        $(this).parent().attr('data-replicated-value', $(this).val());
    })
});
