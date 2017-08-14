<?php
namespace PayrollPH\Services\Deductions;

use PayrollPH\Support\Services;
use PayrollPH\Services\Employee\Facade as Employee;

class Facade extends Services
{
    private $salary; // base salary of Employeee
    private $pay_type; // pay type eg MONTHLY, DAILY, SEMIMONTHLY
    private $per_day; // will be computed by per_day method or can be force by forcePerDay
    private $per_hour; // will be computed by per_hour method or can be force by forcePerHour
    private $absent; // number of absences
    private $late; // minutes of late
    private $total_days; // total days in a year
    private $late_deductions;
    private $absent_deductions;


    public function __construct (Employee $employee, $absent=0, $late=0, $pay_type="MONTHLY")
    {
        $this->salary = $employee->getBaseSalary();
        $this->pay_type = $pay_type;
        $this->total_days = 261;
        $this->perDay();
        $this->perHour();
        $this->computeLates($late);
        $this->computeAbsences($absent);
    }

    public  function setSalary ($salary)
    {
        $this->salary = $salary;
    }

    public function setPayType ($pay_type)
    {
        $this->pay_type = $pay_type;
    }

    private function perDay ()
    {
        //Daily Rate = (Monthly Rate X 12) / Total working days in a year.
        //Php 575.08 = (Php 15,000 X 12) / 313 if working Mondays to Saturdays
        //Php 689.66 = (Php 15,000 X 12) / 261 if working Mondays to Fridays
        $this->per_day = ($this->salary * 12) / $this->total_days;
    }

    private function perHour ()
    {
        //Hourly rate = (Monthly Rate X 12) / total working days in a year/ total working hours per day
        //Php 71.88 = (15,000 X 12) / 313 / 8
        // 313 if MOn to Sat  261 if Mon to Friday
        $this->per_hour = $this->per_day / 8;
    }

    public function forcePerDay ($per_day)
    {
        $this->per_day = $per_day;
        $this->perHour();
    }

    public function forcePerHour ($per_hour)
    {
        $this->per_hour = $per_hour;
    }

    public function computeLates($late)
    {
        $this->late = $late;
        //Lates/Tardiness = (Hourly rate /60 minutes) x total nos. of minutes lates
        //Php 28.50 = (Php 57.00 / 60 mins X 30 mins)
        $late_deductions = ($this->per_hour / 60) * $this->late;
        $this->late_deductions =  round($late_deductions,2);
        return $this;
    }


    public function computeAbsences($absent)
    {
        $this->absent = $absent;
        //Absences deduction = ( Hourly rate X 8 X total nos. of days absent)
        $absent_deductions = ($this->per_hour * 8 * $this->absent);
        $this->absent_deductions =  round($absent_deductions,2);
        return $this;
    }

    public function getLateDeductions()
    {
        return $this->late_deductions;
    }

    public function getAbsentDeductions()
    {
        return $this->absent_deductions;
    }

    public function getTotalDeductions()
    {
        return $this->late_deductions + $this->absent_deductions;
    }

    public function helper()
    {
        return get_object_vars($this);
    }

}
