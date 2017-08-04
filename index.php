<?php
require('vendor/autoload.php');

use PayrollPH\Facades\Employee;
use PayrollPH\Facades\DataSource;
use PayrollPH\Facades\Sss;


$employee = new Employee();

$sss = new Sss($employee);
$dataSource = new DataSource();
$sss->dataSource($dataSource);


//var_dump($employee);
