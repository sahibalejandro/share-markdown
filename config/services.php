<?php

return [

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => 'http://localhost:3000/auth/google/callback',
    ],

];
