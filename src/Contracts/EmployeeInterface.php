<?php

namespace PayrollPH\Contracts;

interface EmployeeInterface
{
    public function setID($employee_id);
    public function setName($employee_name);
    public function setBasicSalary($employee_basic_salary);
    public function setAllowances($employee_allowances);
    public function setLates($employee_lates);
    public function setAbsences($employee_absences);

    // e.g. Monthly, SemiMonthly - how to compute total hours base on type
    public function setPayType($employee_paytype);

    // e.g. Monthly, SemiMonthly - Frequency of payment on salary pay type
    public function setFrequency($employee_frequency);


}
