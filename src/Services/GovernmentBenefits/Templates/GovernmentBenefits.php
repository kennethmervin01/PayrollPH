<?php

namespace PayrollPH\Services\GovernmentBenefits\Templates;
use PayrollPH\Services\GovernmentBenefits\Contracts\GBenefitsInterface;

class GovernmentBenefits
{
    private $salary; //base salary
    private $db;    // source/database handler
    private $table;  // name table of government benefits
    private $from;   // name of column that includes the range salary from -  must be decimal
    private $to;     // name of column that includes the range salary to - must be decimal
    private $ee; // employee share column
    private $er; // employer share column
    private $service; // employer share column
    public $loader;


    public function __construct(GBenefitsInterface $loader, $salary = 0)
    {
        $this->salary = $salary;
        $this->loader = $loader;
        $this->db = $this->loader->loadDB();
        $this->setReference($this->loader->setConfig());
    }


    public function setReference(array $reference)
    {
        if(!is_array($reference)){
            die("setReference Method only accepts valid array definitions");
        }
        $this->setTable($reference['table']);
        $this->setFrom($reference['from']);
        $this->setTo($reference['to']);
        $this->setEe($reference['ee']);
        $this->setEr($reference['er']);
        $this->setServiceName($reference['service']);
    }



    public function setTable($table)
    {
        $this->table = $table;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function setEe($ee)
    {
        $this->ee = $ee;
    }

    public function setEr($er)
    {
        $this->er = $er;
    }

    public function setServiceName($name)
    {
        $this->service = $name;
    }

    public function getVars()
    {
        return get_object_vars($this);
    }

    public function getResult()
    {
        return $this->db
        ->where($this->from,$this->salary, "<=")
        ->where($this->to,$this->salary, ">=")
        ->getOne($this->table);
    }

    public function getEmployeeShare()
    {
        $result = $this->db
        ->where($this->from,$this->salary, "<=")
        ->where($this->to,$this->salary, ">=")
        ->get($this->table,1,[$this->ee]);
        return $result[0][$this->ee];
    }

    public function getEmployerShare()
    {
        $result = $this->db
        ->where($this->from,$this->salary, "<=")
        ->where($this->to,$this->salary, ">=")
        ->get($this->table,1,[$this->er]);
        return $result[0][$this->er];
    }

}
