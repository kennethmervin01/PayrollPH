<?php

namespace PayrollPH\Facades;

use PayrollPH\Concrete\GovernmentBenefits; // Concrete template
use PayrollPH\Contracts\GovernmentBenefitsInterface as GBenefitsContract;
use PayrollPH\Contracts\DataSourceInterface;


class PhilHealth extends GovernmentBenefits implements GBenefitsContract
{
    public function __construct(DataSourceInterface $ds, $salary = 0)
    {
        parent::__construct($ds, $salary);
        $this->setReference([
          'table' => 'philhealth_table',
          'from'  => 'ph_from',
          'to'    => 'ph_to',
          'er'    => 'ph_er',
          'ee'    => 'ph_ee',
          'service' => 'PhilHealth'

        ]);
    }

}
