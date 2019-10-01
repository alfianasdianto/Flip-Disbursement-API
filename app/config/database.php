<?php
require __DIR__.'/../../autoload.php';

$hostName = getenv('DB_HOST');
$DBName = getenv('DB_NAME');
$DBPass = getenv('DB_PASS');
$DBUser = getenv('DB_USER');
$DBPort = getenv('DB_PORT');

try {
    $connect = new PDO("mysql:host={$hostName}:{$DBPort};dbname={$DBName}", $DBUser, $DBPass);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    print "Connected successfully\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . PHP_EOL;
    exit();
}
