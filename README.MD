Laravel ODBC Driver
===============

Simple ODBC Driver, connector whatever...

Installation
------------
```
composer require coraxster/laravel-odbc
```

Config
------------
add to config/db.php as usual


```
# ... config/db.php

'hive' => [
    'driver' => 'odbc',
    'dsn' => 'DRIVER={YOUR_ODBC_DRIVER};Host=host.env;PORT=10000;Schema=default;',
    'username' => '',
    'password' => '',
    'database' => ''
],
# ... where {YOUR_ODBC_DRIVER} is driver from odbcinst.ini or path to driver.so
```
