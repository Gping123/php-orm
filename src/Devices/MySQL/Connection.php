<?php

namespace Orm\Devices\MySQL;

use Orm\Config\Config;
use PDO;

/**
 * Class Connection
 * @package Orm\Devices\MySQL
 * @author GP
 * DateTime: 2022/9/6 11:00
 */
class Connection
{
    /**
     * PDO驱动类型
     */
    const DEVICE_TYPE = 'mysql';

    /**
     * pdo对象
     * @var null|PDO
     */
    protected $pdo = null;

    /**
     * 配置信息对象
     * @var Config $config
     */
    protected $config = null;

    // ====== public methods ======
    /**
     * 禁止向外创建实例
     * Connection constructor.
     * @param Config|null $config
     */
    public function __construct(?Config $config = null)
    {
        // 设置配置信息
        $config instanceof Config && $this->setConfig($config);

        // 初始化
        $this->initialize();
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return static
     */
    public function setConfig(Config $config): self
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return PDO|null
     */
    public function getPdo(): ?PDO
    {
        return $this->pdo;
    }


    // ====== protected methods ======

    /**
     * 初始化方法
     * @return Connection
     * @author GP
     * DateTime: 2022/9/6 17:51
     */
    protected function initialize() : self
    {
        $dsn = $this->getConfig()->toDSN(static::DEVICE_TYPE);

        $this->pdo = new PDO($dsn, $this->getConfig()->getUser(), $this->getConfig()->getPass());

        return $this;
    }

    // ====== private methods ======

}