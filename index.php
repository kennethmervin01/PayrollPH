<?php
require('vendor/autoload.php');

use PayrollPH\Facades\DataSource;
use PayrollPH\Facades\Employee;
use PayrollPH\Facades\Sss;
use PayrollPH\Facades\PagIbig;
use PayrollPH\Facades\PhilHealth;
use PayrollPH\Facades\PaySlip;




$db  = new DataSource('localhost','root','','human_resources');
$employee = new Employee('PH001001', 'Jon Snow', 10250);
$sss = new Sss($db,10250);
$pagibig = new Pagibig($db,10250);
$philhealth = new PhilHealth($db,10250);

$payslip = new PaySlip($employee);
$payslip->addGBenefits($sss);
$payslip->addGBenefits($pagibig);
$payslip->addGBenefits($philhealth);
var_dump($payslip->gov_benefits);
