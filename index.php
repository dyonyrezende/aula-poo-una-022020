<?php

require_once "src/Entities/ContaGold.php";
require_once "src/Entities/ContaPlatinum.php";
require_once "src/Entities/ContaRale.php";
require_once "src/Entities/ContaPadrao.php";

$conta = new ContaGold("0004", 1);
$conta->deposito(10);
$conta->saque(20);
$conta->saque(1);
print("EXTRATO CONTA<br>");
$conta->extrato();
print("SALDO: R$ " . $conta->saldo() . "<br>");
print("<br>");
