<?php

namespace PayrollPH\Services\GovernmentBenefits;
use PayrollPH\Services\GovernmentBenefits\Contracts\GBenefitsInterface as GBenefitsContract;
use PayrollPH\Contracts\DataSourceInterface;

class PhilHealth  implements GBenefitsContract
{
      public $db;

      public function __construct(DataSourceInterface $db)
      {
        $this->db = $db->load();
      }

      public function setConfig()
      {
          return $config = [
            'table' => 'philhealth_table',
            'from'  => 'ph_from',
            'to'    => 'ph_to',
            'er'    => 'ph_er',
            'ee'    => 'ph_ee',
            'service' => 'PhilHealth'
          ];
      }

      public function loadDB()
      {
          return $this->db;
      }

}
