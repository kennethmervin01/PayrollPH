<?php
require('vendor/autoload.php');
use PayrollPH\Facades\DataSource;
use PayrollPH\Kernel;

$db  = new DataSource('localhost','root','','human_resources');
$cpu = new Kernel();
$sss = $cpu->run('GBenefits',$db,10250)->make('SSS');
$employee = $cpu->run('Employee',['first_name' => 'Kenneth', 'last_name' => 'Enriquez', 'base_salary' => 10250])->getEmployee();

var_dump($employee);
