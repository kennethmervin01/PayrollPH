<?php

namespace PayrollPH\Services\GovernmentBenefits;
use PayrollPH\Services\GovernmentBenefits\Contracts\GBenefitsInterface as GBenefitsContract;
use PayrollPH\Contracts\DataSourceInterface;

class PagIbig  implements GBenefitsContract
{
      private $db;

      public function __construct(DataSourceInterface $db)
      {
        $this->db = $db->load();
      }

      public function setConfig()
      {
          return $config = [
            'table' => 'pagibig_table',
            'from'  => 'pg_from',
            'to'    => 'pg_to',
            'er'    => 'pg_er',
            'ee'    => 'pg_ee',
            'service' => 'PagIbig'
          ];
      }

      public function loadDB()
      {
          return $this->db;
      }

}
