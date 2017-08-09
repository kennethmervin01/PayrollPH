<?php

namespace PayrollPH\Facades;
use PayrollPH\Contracts\GovernmentBenefitsInterface;
use PayrollPH\Contracts\EmployeeInterface;

class PaySlip
{
    public $gov_benefits;
    private $employee;

    public function __construct(EmployeeInterface $employee,  $gov_benefits=[])
    {
        $this->gov_benefits = $gov_benefits;
        $this->employee = $employee;
    }

    public function addGBenefits(GovernmentBenefitsInterface $gbenefits)
    {
        $service   = $gbenefits->getVars()['service'];
        $deduction = $gbenefits->getEmployeeShare();
        $this->gov_benefits[$service] = $deduction;
    }


}
