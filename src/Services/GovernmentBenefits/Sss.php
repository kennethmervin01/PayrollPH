<?php

namespace PayrollPH\Services\GovernmentBenefits;
use PayrollPH\Services\GovernmentBenefits\Contracts\GBenefitsInterface as GBenefitsContract;
use PayrollPH\Contracts\DataSourceInterface;

class Sss  implements GBenefitsContract
{
      private $db;

      public function __construct(DataSourceInterface $db)
      {
        $this->db = $db->load();
      }

      public function setConfig()
      {
          return $config = [
            'table' => 'sss_table',
            'from'  => 'sss_from',
            'to'    => 'sss_to',
            'er'    => 'sss_er',
            'ee'    => 'sss_ee',
            'service' => 'PagIbig'
          ];
      }

      public function loadDB()
      {
          return $this->db;
      }

}
