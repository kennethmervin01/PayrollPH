<?php

namespace PayrollPH\Facades;

use PayrollPH\Concrete\GovernmentBenefits; // Concrete template
use PayrollPH\Contracts\GovernmentBenefitsInterface as GBenefitsContract;
use PayrollPH\Contracts\DataSourceInterface;


class PagIbig extends GovernmentBenefits implements GBenefitsContract
{
    public function __construct(DataSourceInterface $ds, $salary = 0)
    {
        parent::__construct($ds, $salary);
        $this->setReference([
          'table' => 'pagibig_table',
          'from'  => 'pg_from',
          'to'    => 'pg_to',
          'er'    => 'pg_er',
          'ee'    => 'pg_ee',
          'service' => 'Pag-Ibig'
        ]);
    }

}
