<?php

namespace Orm\Devices\MySQL;

use Orm\Config\Config;

class Database
{
    /**
     * @var Connection $connect
     */
    protected $connect = null;

    /**
     * Database constructor.
     * @param Config|null $config
     */
    public function __construct(?Config $config = null)
    {
        $config && $this->initialize($config);
    }

    /**
     * @param string $sql
     * @return false|\PDOStatement
     * @author GP
     * DateTime: 2022/9/6 18:40
     */
    public function query(string $sql)
    {
        return $this->connect->getPdo()->query($sql);
    }

    // ====== protected methods ======

    /**
     * 初始化
     * @param Config $config
     * @author GP
     * DateTime: 2022/9/6 18:33
     */
    protected function initialize(Config $config)
    {
        // 初始化连接
        $this->initializeConnect($config);
    }

    /**
     * 初始化连接
     * @param Config $config
     * @author GP
     * DateTime: 2022/9/6 18:33
     */
    protected function initializeConnect(Config $config)
    {
        $this->connect = new Connection($config);
    }

}
