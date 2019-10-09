<?php
return [ 
'client_id' => env('PAYPAL_CLIENT_ID','Ac5urOgkX76oNhPA3cvIs-vcMNeJEZEc53aEXXz3eMjQHIRjPCXuR2EdUTsAQ6QLOW49kWZ15V0UbVA2'),
'secret' => env('PAYPAL_SECRET','EFZfz1UXp7vthm7BtnmF8y7y8Y6W4BvGDbqXF2uoGG518bIurxTBx_qgx3jNMjL-lZ-uKg-9Fya6Lscw'),
'settings' => array(
'mode' => env('PAYPAL_MODE','sandbox'),
'http.ConnectionTimeOut' => 30,
'log.LogEnabled' => true,
'log.FileName' => storage_path() . '/logs/paypal.log',
'log.LogLevel' => 'ERROR',
),
];


 