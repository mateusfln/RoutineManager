<?php
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'        => 'localhost',
                    'port'        => '3306',
                    'user'        => 'root',
                    'password'    => '',
                    'dbname'      => 'RoutineManager',
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