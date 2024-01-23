//place custom scripts for admin
moment.locale('de');

const ruDate = {
    previousMonth: 'vorheriger Monat',
    nextMonth: 'nächsten Monat',
    months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
    weekdays: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
    weekdaysShort: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa']
};

$(function () {
    $('.pikaday').each(function (index, element) {
        new Pikaday({
            field: element,
            i18n: ruDate,
            firstDay: 1,
            format: 'DD.MM.YYYY',
            onSelect: function () {
                $(element).trigger('input', {value: element.value});
            }
        });
    })
});
