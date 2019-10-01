<?php
$variables = [
    'DB_HOST' => 'localhost',
    'DB_USER' => 'root',
    'DB_PASS' => 'root',
    'DB_NAME' => 'testing_api',
    'DB_PORT' => '8889',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}