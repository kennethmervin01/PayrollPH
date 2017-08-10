<?php
require('vendor/autoload.php');

use PayrollPH\Facades\DataSource;
use PayrollPH\Services\Employee\Facade as Employee;
use PayrollPH\Services\GovernmentBenefits\Facade as Gbenefits;

$db  = new DataSource('localhost','root','','human_resources');
$benefits = new Gbenefits($db,10250);
$employee = new Employee(['first_name' => 'Kenneth', 'last_name' => 'Enriquez', 'base_salary' => 10250]);
var_dump($employee->make("WHOYOU"));
