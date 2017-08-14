<?php

namespace PayrollPH\Services;
use PayrollPH\Contracts\DataSourceInterface;

use MysqliDb;

class DataSource implements DataSourceInterface
{
    protected $host;
    protected $username;
    protected $password;
    protected $database;

    public function __construct($host='localhost',$username='root',$password='', $database="human_resources")
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function load()
    {
        return new MysqliDb($this->host,$this->username,$this->password,$this->database);
    }
}
