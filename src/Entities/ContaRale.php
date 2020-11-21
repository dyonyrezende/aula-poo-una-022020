<?php

require_once "ContaAbstract.php";
require_once realpath(__DIR__ . "/../Interfaces/ContaFazDepositoInterface.php");
require_once realpath(__DIR__ . "/../Interfaces/ContaFazSaqueInterface.php");

class ContaRale extends ContaAbstract
implements ContaFazDepositoInterface,
        ContaFazSaqueInterface

{
    public function __construct($agencia, $id)
    {
        parent::__construct($agencia, $id);

        $this->limite = 20;
        $this->tipo = "002";
    }

    public function deposito($valor){

        $this->movimentacao[] = $valor;
        
    }

    public function saque(float $valor)
    {
        $saldo = $this->saldo();
        $novoSaldo = $saldo - $valor;

        if (($novoSaldo < 0) && (abs($novoSaldo) > $this->limite)) {
            print("Saldo insuficiente de saque no valor R$ " . $valor. "<br>");
            return;
        }else{

            $this->movimentacao[] = -$valor;
            $this->movimentacao[] = -0.01;

        }

    }

    public function extrato()
    {
        parent::extrato();
        $this->movimentacao[] = -0.1;
    }

}
