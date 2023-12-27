<?php

require "../Conta.php";

$contaUm = new Conta();
$contaDois = new Conta();

$contaUm->cpfTitular = "235.432.562-24";
$contaUm->nomeTitular = "Silvia";
$contaUm->depositar(3434);

var_dump($contaUm);