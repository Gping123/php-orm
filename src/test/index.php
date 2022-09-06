<?php

    include_once  __DIR__.'/../../vendor/autoload.php';

    use \Orm\Config\Config;

    $config = new Config('127.0.0.1', 3306, 'root', '123456', 'laravel');

    $connect = new \Orm\Devices\MySQL\Database($config);

    /**
     * @var PDOStatement $statement
     */
    $statement = $connect->query('select * from users');
    var_dump($statement->fetchAll());

