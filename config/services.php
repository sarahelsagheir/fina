<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key'=> 'pk_live_FelsJHinHy3bjYwJQBV8eec800NsoBT0BO',        
        'secret' => 'sk_test_l3aH1wRbcweGiMge6vDejT7C00Fhjm0Z7E',
        'version' => '2019-02-19',
    ],

    'facebook' => [
        'client_id' => '179235176631169',
        'client_secret' => '6d8c796f93e3e78ce0ec3c5b63d326f7',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
      ], 

      'google' => [
        'client_id' => '326541597074-027kcr2qjs6eujumpfk96ah16bpk1l8s.apps.googleusercontent.com',
        'client_secret' => 'HDBhzByUxO9dXPKH0TApdRsc',
        'redirect' => 'http://localhost:8000/login/google/callback',
      ], 

      'twitter' => [
        'client_id' => 'Lh8a2hh7XdbGCXYltnfZoX0ZK',
        'client_secret' => 'SuxZFeW38fkV4fpdFCPBf07KboiEgHQQ5FTusaKMUh88YIR2e4',
        'redirect' => 'http://127.0.0.1:8000/login/twitter/callback',
      ], 

];
