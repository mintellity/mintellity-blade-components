import moment from 'moment';
import Pikaday from 'pikaday';

moment.locale('de');

const translations = {
    previousMonth: 'Vorheriger Monat',
    nextMonth: 'Nächster Monat',
    months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
    weekdays: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
    weekdaysShort: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa']
};

document.addEventListener("DOMContentLoaded", function() {
    const pikadayElements = document.querySelectorAll('.pikaday');

    for (let i = 0; i < pikadayElements.length; i++) {
        const element = pikadayElements[i];

        new Pikaday({
            field: element,
            i18n: translations,
            firstDay: 1,
            format: 'DD.MM.YYYY',
            onSelect: function() {
                const event = new Event('input');
                event.value = element.value;
                element.dispatchEvent(event);
            }
        });
    }
});
