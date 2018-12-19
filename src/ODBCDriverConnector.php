<?php

namespace Coraxster\ODBCDriver;

use Illuminate\Database\Connectors\Connector;
use Illuminate\Database\Connectors\ConnectorInterface;
use PDO;

/**
 * Class ODBCDriverConnector
 * @package Coraxster\ODBCDriver
 */
class ODBCDriverConnector extends Connector implements ConnectorInterface
{

    /**
     * @param array $config
     * @return PDO
     */
    public function connect(array $config)
    {
        $dsn = $this->getDsn($config);

        $options = $this->getOptions($config);

        return $this->createConnection($dsn, $config, $options);
    }

    /**
     * @param array $config
     * @return mixed|string
     */
    protected function getDsn(array $config)
    {
        $dsn = $config['dsn'];

        return strpos($dsn, 'odbc:') === 0 ? $dsn : 'odbc:' . $dsn;
    }

    /**
     * Create a new PDO connection.
     *
     * @param  string  $dsn
     * @param  array   $config
     * @param  array   $options
     * @return \PDO
     */
    public function createConnection($dsn, array $config, array $options)
    {
        $username = isset($config['username']) ? $config['username'] : null;
        $password = isset($config['password']) ? $config['password'] : null;

        return new PDO($dsn, $username, $password, $options);
    }

}