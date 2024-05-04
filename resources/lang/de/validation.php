<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute muss angenommen sein.',
    'active_url'           => ':attribute ist kein gültiger URL.',
    'after'                => ':attribute muss das Datum nach dem :date sein.',
    'alpha'                => ':attribute darf nur aus Buchstaben bestehen.',
    'alpha_dash'           => ':attribute darf nur aus Buchstaben, Zahlen und Bindestriche bestehen.',
    'alpha_num'            => ':attribute darf nur aus Buchstaben und Zahlen bestehen.',
    'array'                => ':attribute muss eine Reihe sein.',
    'before'               => ':attribute muss das Datum vor dem :date sein.',
    'between'              => [
        'numeric' => ':attribute muss zwischen :min - :max sein.',
        'file'    => ':attribute muss zwischen :min - :max Kilobyte sein.',
        'string'  => ':attribute muss zwischen :min - :max Zeichen lang sein.',
        'array'   => ':attribute mus aus zwischen :min - :max Item bestehen.',
    ],
    'boolean'              => ':attribute Feld muss wahr oder falsch sein.',
    'confirmed'            => ':attribute Bestätigung nicht entsprechend.',
    'date'                 => ':attribute is kein gültiges Datum.',
    'date_format'          => ':attribute entspricht nicht dem Format :format.',
    'different'            => ':attribute und :other müssen unterschiedlich sein.',
    'digits'               => ':attribute muss aus :digits Zahlen bestehen.',
    'digits_between'       => ':attribute muss aus zwischen :min und :max Zahlen bestehen.',
    'dimensions'           => ':attribute hat nicht unterstützte Bilddimension.',
    'distinct'             => ':attribute Feld hat duplizierten Wert.',
    'email'                => ':attribute muss gültige E-Mail-Adresse sein.',
    'exists'               => 'Ausgewählte :attribute ist ungültig.',
    // 'filled'               => ':attribute Feld ist erforderlich.',
    'filled'               => ':attribute Feld ist erforderlich.',
    'image'                => ':attribute muss ein Bild sein.',
    'in'                   => 'Ausgewählte :attribute ist ungültig.',
    'in_array'             => ':attribute Feld besteht nicht in :other.',
    'integer'              => ':attribute muss eine ganze Zahl sein.',
    'ip'                   => ':attribute muss gültige IP-Adresse sein.',
    'json'                 => ':attribute muss gültige JSON-Zeichenfolge sein.',
    'max'                  => [
        'numeric' => ':attribute darf nicht größer als :max sein.',
        'file'    => ':attribute darf nicht größer als :max Kilobyte sein.',
        'string'  => ':attribute darf nicht größer als :max Zeichen sein.',
        'array'   => ':attribute darf nich mehr als :max Item haben.',
    ],
    'mimes'                => ':attribute muss eine Datei im folgenden Dateiformat sein: :values.',
    'min'                  => [
        'numeric' => ':attribute muss mindestend :min sein.',
        'file'    => ':attribute muss mindestend :min Kilobyte sein.',
        'string'  => ':attribute muss mindestend :min Zeichen lang sein.',
        'array'   => ':attribute muss mindestend :min Item haben.',
    ],
    'not_in'               => 'Ausgewählte :attribute ist ungültig.',
    'numeric'              => ':attribute muss ein Zahl sein.',
    'present'              => ':attribute Feld muss vorliegen.',
    'regex'                => ':attribute Format ist ungültig.',
    'required'             => ':attribute Feld ist erforderlich.',
    'required_if'          => ':attribute Feld ist erforderlich, wenn :other :value ist.',
    'required_unless'      => ':attribute field ist erforderlich, wenn :other nicht in :values ist.',
    'required_with'        => ':attribute field ist erforderlich, wenn :values vorliegen.',
    'required_with_all'    => ':attribute Feld is erforderlich, wenn :values vorliegen.',
    'required_without'     => ':attribute Feld ist erforderlich, wenn :values nicht vorliegen.',
    'required_without_all' => ':attribute Feld ist erforderlich, wenn keine :values vorliegen.',
    'same'                 => ':attribute und :other müssen übereinstimmen.',
    'size'                 => [
        'numeric' => ':attribute muss :size sein.',
        'file'    => ':attribute muss :size Kilobyte sein.',
        'string'  => ':attribute muss :size Zeichen sein.',
        'array'   => ':attribute muss aus :size Item bestehen.',
    ],
    'string'               => ':attribute muss eine Zeichenkette sein.',
    'timezone'             => ':attribute muss gültige Zeitzone sein.',
    'unique'               => ':attribute ist bereits vergeben.',
    'url'                  => ':attribute Format ist ungültig.',

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

    'custom'                => [
        'attribute-name'    => [
            'rule-name'     => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'            => [],

];
