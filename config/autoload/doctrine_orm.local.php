<?php
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => 'mysql_5_7',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => 'password',
                    'dbname'   => 'RoutineManager',
                    'driverOptions' => array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    )
                )
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'proxy_dir' => 'core/server/data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
            )
        )
    ),
);