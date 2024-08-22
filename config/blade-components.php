<?php

return [
    // The default configuration for all forms
    'forms' => [
        // Whether the labels should be displayed inline with the input fields
        'inline-labels' => false,
        // Width of the inline labels (1-11 columns)
        'inline-labels-width' => '2',

        // Disable the submit button after it has been clicked (to prevent double submissions)
        'disable-button-on-submit' => app()->environment('production'),
    ],
];
