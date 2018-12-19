<?php

namespace Coraxster\ODBCDriver;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

/**
 * Class ODBCServiceProvider
 * @package Coraxster\ODBCDriver
 */
class ODBCServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('db.connector.odbc', function () {
            return new ODBCConnector;
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