<?php

namespace Coraxster\ODBCDriver;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

/**
 * Class ODBCDriverServiceProvider
 * @package Coraxster\ODBCDriver
 */
class ODBCDriverServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('db.connector.odbc', function () {
            return new ODBCDriverConnector;
        });

        $this->app->make('db')->resolverFor('odbc', function ($connection, $database, $prefix, $config) {
            return new Connection($connection, $database, $prefix, $config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('odbcdriver');
    }
}