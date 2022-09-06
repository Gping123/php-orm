<?php

namespace Orm\Config;

class Config 
{
    /**
     * @var string
     */
    protected $host = '';

    /**
     * @var string
     */
    protected $port = '';

    /**
     * @var string
     */
    protected $user = '';

    /**
     * @var string
     */
    protected $pass = '';

    /**
     * @var string
     */
    protected $database = '';

    /**
     * @var string
     */
    protected $prefix = '';

    /**
     * Config constructor.
     * @param string|null $host
     * @param int|null $port
     * @param string|null $user
     * @param string|null $pass
     * @param string|null $database
     * @param string|null $prefix
     */
    public function __construct(
        ?string $host = '',
        ?int $port = 3306,
        ?string $user = '',
        ?string $pass = '',
        ?string $database = '',
        ?string $prefix = ''
    )
    {
        $this->setHost($host);
        $this->setPort($port);
        $this->setUser($user);
        $this->setPass($pass);
        $this->setDatabase($database);
        $this->setPrefix($prefix);
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @param string $port
     */
    public function setPort(string $port): void
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * @param string $database
     */
    public function setDatabase(string $database): void
    {
        $this->database = $database;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    /**
     * 转成dsn字符串
     * @param string $type
     * @return string
     * @author GP
     * DateTime: 2022/9/6 17:54
     */
    public function toDSN(string $type = 'mysql') : string
    {
        return sprintf('%s:host=%s:%s;dbname=%s', $type, $this->getHost(), $this->getPort(), $this->getDatabase());
    }

}
