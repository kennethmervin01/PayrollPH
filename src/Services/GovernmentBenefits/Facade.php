<?php

namespace PayrollPH\Services\GovernmentBenefits;

use PayrollPH\Support\Services;
use PayrollPH\Services\GovernmentBenefits\Templates\GovernmentBenefits as GovernmentBenefits;

use PayrollPH\Contracts\DataSourceInterface as DB;
use PayrollPH\Services\Employee\Facade as Employee;

use PayrollPH\Services\GovernmentBenefits\Sss;
use PayrollPH\Services\GovernmentBenefits\PagIbig;
use PayrollPH\Services\GovernmentBenefits\Philhealth;


class Facade extends Services
{
    public function __construct(DB $src, Employee $employee)
    {
        $value = $employee->getBaseSalary();
        $template = GovernmentBenefits::class;
        $this->bind( new $template(new Sss($src), $value), 'SSS');
        $this->bind( new $template(new PagIbig($src), $value), 'PagIbig');
        $this->bind( new $template(new Philhealth($src), $value), 'Philhealth');
    }


}
