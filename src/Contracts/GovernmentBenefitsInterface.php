<?php

namespace PayrollPH\Contracts;

interface GovernmentBenefitsInterface
{
    public function setReference(array $reference);
    public function getEmployeeShare();
    public function getEmployerShare();
    public function getResult();
    public function getVars();
}
