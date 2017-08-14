<?php
require('vendor/autoload.php');
use PayrollPH\Kernel;

$cpu = new Kernel();
$cpu->build('Employee',['first_name' => 'Kenneth', 'last_name' => 'Enriquez', 'base_salary' => 10250]);
$cpu->build('GBenefits');
$cpu->build('Deductions');
