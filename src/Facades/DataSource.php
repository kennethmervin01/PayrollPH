<?php

namespace PayrollPH\Facades;
use PayrollPH\Contracts\DataSourceInterface;

use MysqliDb;

class DataSource implements DataSourceInterface
{
    public $host;
    public $username;
    public $password;
    public $database;
    public $db;

    public function __construct($host='localhost',$username='root',$password='', $database="human_resources")
    {
        $this->load($host,$username,$password,$database);
    }

    public function load($host,$username,$password,$database)
    {
        $this->db = new MysqliDb($host,$username,$password,$database);
    }
}
