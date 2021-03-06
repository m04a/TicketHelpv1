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
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_CLIENT_REDIRECT'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_OAUTH_ID'),
        'client_secret' => env('GOOGLE_OAUTH_KEY'),
        'redirect' => env('GOOGLE_CLIENT_REDIRECT'),
    ],
    'discord' => [
        'client_id' => env('DISCORD_OAUTH_ID'),
        'client_secret' => env('DISCORD_OAUTH_KEY'),
        'redirect' => env('DISCORD_CLIENT_REDIRECT'),
    ],
    'instagram' => [
        'client_id' => env('INSTAGRAM_OAUTH_ID'),
        'client_secret' => env('INSTAGRAM_OAUTH_KEY'),
        'redirect' => env('INSTAGRAM_CLIENT_REDIRECT'),
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URI')
    ],
    'vkontakte' => [
        'client_id' => env('VKONTAKTE_CLIENT_ID'),
        'client_secret' => env('VKONTAKTE_CLIENT_SECRET'),
        'redirect' => env('VKONTAKTE_REDIRECT_URI')
      ],
      'reddit' => [    
        'client_id' => env('REDDIT_CLIENT_ID'),  
        'client_secret' => env('REDDIT_CLIENT_SECRET'),  
        'redirect' => env('REDDIT_REDIRECT_URI') 
      ],
    'gitlab' => [    
        'client_id' => env('GITLAB_CLIENT_ID'),  
        'client_secret' => env('GITLAB_CLIENT_SECRET'),  
        'redirect' => env('GITLAB_REDIRECT_URI') 
    ],
];
