<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['Content-Type', 'X-Requested-With', 'Content-Type', 'X-Requested-With', 'Authorization'],
    'allowedMethods' => ['OPTIONS', 'GET', 'POST', 'PUT', 'PATCH', 'DELETE'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
