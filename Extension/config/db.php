<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=extension',
    'username' => 'postgres',
    'password' => 'postgres',
    'charset' => 'utf8',
// Schema cache options (for production environment)
//'enableSchemaCache' => true,
//'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];

/*
return [
    'components' => [
        'db1' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;port=5432;dbname=extension',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
        ],
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;port=5432;dbname=designa',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
        ]
    ],
];*/
