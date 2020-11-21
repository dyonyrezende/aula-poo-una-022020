<?php

require_once "ContaAbstract.php";
require_once realpath(__DIR__ . "/../Interfaces/ContaFazDepositoInterface.php");
require_once realpath(__DIR__ . "/../Interfaces/ContaFazSaqueInterface.php");

class ContaPlatinum extends ContaAbstract
    implements ContaFazDepositoInterface,
        ContaFazSaqueInterface

{
    public function __construct($agencia, $id)
    {
        parent::__construct($agencia, $id);

        $this->tipo = "004";
    }

    public function deposito($valor){

        $this->movimentacao[] = $valor;
        $this->movimentacao[] = 1.0;

    }

    public function saque($valor){

        if($valor > 0.5){
            $this->movimentacao[] = 0.5;
        }

       $this->movimentacao[] = -$valor;

    }

    

}
