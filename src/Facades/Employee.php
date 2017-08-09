<?php

namespace PayrollPH\Facades;
use PayrollPH\Contracts\EmployeeInterface;

class Employee implements EmployeeInterface
{

    public $employee_id; // employee Id
    public $employee_name; // employee name
    public $employee_basic_salary; // employee basic salary
    public $employee_allowances;   // employee additional allowances - decimal
    public $employee_lates;        // employee_lates - decimal
    public $employee_absences;    // employee_absences - decimal
    public $employee_paytype;    // employee_paytype  - Monthly, SemiMonthly
    public $employee_frequency; // frequency of pay day - SemiMonthly

    public static $instance;


    public function __construct($id=null, $name=null, $basic=null, $allowances=0, $lates=0, $absences=0, $paytype="MONTHLY", $freq = "SEMI")
    {
        $this->setID($id);
        $this->setName($name);
        $this->setBasicSalary($basic);
        $this->setAllowances($allowances);
        $this->setLates($lates);
        $this->setAbsences($absences);
        $this->setPayType($paytype);
        $this->setFrequency($freq);
        self::$instance++;
    }

    public function setID($val)
    {
        //Add something later
        $this->employee_id = $val;
        return $this;
    }

    public function setName($val)
    {
        //Add something later
        $this->employee_name = $val;
        return $this;
    }

    public function setBasicSalary($val)
    {
        //Add something later
        $this->employee_basic_salary = $val;
        return $this;
    }

    public function setAllowances($val)
    {
        //Add something later
        $this->employee_allowances = $val;
        return $this;
    }

    public function setLates($val)
    {
        //Add something later
        $this->employee_lates = $val;
        return $this;
    }

    public function setAbsences($val)
    {
        //Add something later
        $this->employee_absences = $val;
        return $this;
    }

    public function setPayType($val)
    {
        $this->employee_paytype = $val;
    }

    public function setFrequency($val)
    {
        $this->employee_frequency = $val;
    }

    public function getEmployee()
    {
        return get_object_vars($this);
    }

    public function getBaseSalary()
    {
        return  $this->employee_basic_salary;
    }

}
