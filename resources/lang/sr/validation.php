<?php

return [

    'date'             => 'Polje :attribute nije validan datum.',
    'max'              => [
        'string' => 'Polje :attribute ne sme biti vece od :max karaktera.',
    ],
    'numeric'          => 'Polje :attribute mora biti broj.',
    'regex'            => 'Polje :attribute nije validan format.',
    'required'         => 'Polje :attribute je obavezno.',
    'required_without' => 'Polje :attribute je obavezno ako polje :values nije prisutno.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'date'          => __('item.date'),
        'description'   => __('item.description'),
        'product_value' => __('item.product_value'),
        'service_value' => __('item.service_value'),
        'id'            => __('taxpayer.id'),
        'name'          => __('taxpayer.name'),
        'place'         => __('taxpayer.place'),
        'taxpayer_code' => __('taxpayer.taxpayer_code'),
        'activity_code' => __('taxpayer.activity_code'),
    ],

];
