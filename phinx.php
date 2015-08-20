<?php

require __DIR__ . '/vendor/autoload.php';

$localConfig = Nette\Neon\Neon::decode(file_get_contents(__DIR__ . '/app/config/config.local.neon'));
$dsn = $localConfig['database']['dsn'];
$dsnArray = explode(';', $dsn);
$dsnHost = explode(':host=', $dsnArray[0]);
$dsnDb = str_replace('dbname=', $dsnArray[1]);

$adapter = $dsnHost[0];
$host = $dsnHost[1];
$database = $dsnDb;
$user = $localConfig['database']['user'];
$password = $localConfig['database']['password'];

return [
    'paths' => [
        'migrations' => 'app/migrations'
    ],
    'environments' => [
        "default_migration_table" => "_phinx_log",
        "default_database" => "production",
        "production" => array(
            "adapter" => $adapter,
            "host" => $host,
            "name" => $database,
            "user" => $user,
            "pass" => $password
        )
    ]
];