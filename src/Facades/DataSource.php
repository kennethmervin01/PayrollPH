<?php

namespace PayrollPH\Facades;
use PayrollPH\Contracts\DataSourceInterface;

use MysqliDb;

class DataSource implements DataSourceInterface
{
    protected $host;
    protected $username;
    protected $password;
    protected $database;

    public function __contruct($host='localhost',$username='root',$password='', $database="human_resources"){
        $this->load($host,$username,$password,$database);
    }

    public function load($host,$username,$password,$database)
    {
        $db = new MysqliDb($host,$root,$password,$database);
        return $db;
    }
}
