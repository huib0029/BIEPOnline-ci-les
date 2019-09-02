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

    'accepted' => 'De :attribute moet geaccepteerd worden.',
    'active_url' => 'De :attribute is geen geldige URL.',
    'after' => 'De :attribute moet een datum zijn na :date.',
    'after_or_equal' => 'De :attribute moet een datum zijn op of na :date.',
    'alpha' => 'De :attribute mag alleen letters bevatten.',
    'alpha_dash' => 'De :attribute mag alleen letters, cijfers en spaties bevatten.',
    'alpha_num' => 'De :attribute mag alleen letters en cijfers bevatten.',
    'array' => 'De :attribute moet een array zijn.',
    'before' => 'De :attribute moet een datum zijn voor :date.',
    'before_or_equal' => 'De :attribute moet een datum zijn op of voor :date.',
    'between' => [
        'numeric' => 'De :attribute moet tussen :min en :max liggen.',
        'file' => 'De :attribute moet tussen :min en :max KB liggen.',
        'string' => 'De :attribute moet tussen de :min en :max aantal tekens liggen.',
        'array' => 'De :attribute moet tussen de :min en :max aantal items liggen.',
    ],
    'boolean' => 'Het :attribute veld moet true of false zijn.',
    'confirmed' => 'Het :attribute is niet gelijk.',
    'date' => 'De :attribute is geen geldige datum.',
    'date_format' => 'De :attribute komt niet overeen met het formaat :format.',
    'different' => 'De :attribute en :other moeten verschillend zijn.',
    'digits' => 'De :attribute moet :digits cijfers zijn.',
    'digits_between' => 'De :attribute moet tussen :min en :max cijfers zijn.',
    'dimensions' => 'De :attribute heeft niet de juiste afmetingen.',
    'distinct' => 'Het :attribute veld heeft een dubbele waarde.',
    'email' => 'De :attribute moet een geldig email adres zijn.',
    'exists' => 'De geselecteerde :attribute is ongeldig.',
    'file' => 'De :attribute moet een bestand zijn.',
    'filled' => 'De :attribute veld moet een waarde bevatten.',
    'image' => 'De :attribute moet een afbeelding zijn.',
    'in' => 'De selected :attribute is ongeldig.',
    'in_array' => 'Het :attribute veld bestaat niet in :other.',
    'integer' => 'De :attribute moet een integer zijn.',
    'ip' => 'De :attribute moet een geldig IP adres zijn.',
    'json' => 'De :attribute moet een geldige JSON string zijn.',
    'max' => [
        'numeric' => 'De :attribute mag niet groter zijn dan :max.',
        'file' => 'De :attribute mag niet groter zijn dan :max kilobytes.',
        'string' => 'De :attribute mag niet groter zijn dan :max characters.',
        'array' => 'De :attribute mag niet meer items bevatten dan :max items.',
    ],
    'mimes' => 'De :attribute must be a file of type: :values.',
    'mimetypes' => 'De :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Het :attribute moet op zijn minst :min bevatten.',
        'file' => 'De :attribute must be at least :min kilobytes.',
        'string' => 'Het :attribute moet op zijn minst :min karakters bevatten.',
        'array' => 'De :attribute must have at least :min items.',
    ],
    'not_in' => 'De geselecteerde :attribute is ongeldig.',
    'numeric' => 'Het :attribute moet een getal zijn.',
    'present' => 'Het :attribute field moet aanwezig zijn.',
    'regex' => 'Het :attribute formaat is ongeldig.',
    'required' => 'Het :attribute veld moet nog ingevuld te worden.',
    'required_if' => 'De :attribute field is required when :other is :value.',
    'required_unless' => 'De :attribute field is required unless :other is in :values.',
    'required_with' => 'De :attribute field is required when :values is present.',
    'required_with_all' => 'De :attribute field is required when :values is present.',
    'required_without' => 'De :attribute field is required when :values is not present.',
    'required_without_all' => 'Het :attribute field is required when none of :values are present.',
    'same' => 'Het :attribute en :other moet gelijk zijn.',
    'size' => [
        'numeric' => 'De :attribute moet :size zijn.',
        'file' => 'De :attribute moet :size kilobytes zijn.',
        'string' => 'De :attribute moet :size karakters zijn.',
        'array' => 'De :attribute moet :size items bevatten.',
    ],
    'string' => 'De :attribute moet een string zijn.',
    'timezone' => 'De :attribute moet een geldige zone zijn.',
    'unique' => 'De :attribute is al in gebruik.',
    'uploaded' => 'De :attribute kan niet worden geüpload .',
    'url' => 'Het :attribute formaat is niet geldig.',

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
        'attribute-naam' => [
            'rule-naam' => 'custom-message',
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

    'attributes' => [
        'username' => 'gebruikersnaam',
        'password' => 'wachtwoord',
        'characters' => 'karakters',
        'name' => 'naam',
        'max characters' => 'karakters',
        'title' => 'titel',
        'author' => 'auteur',
        'author_id' => 'auteur',
        'category_id' => 'categorie',
        'category' => 'categorie',
        'isbn' => 'ISBN',

    ]

];
