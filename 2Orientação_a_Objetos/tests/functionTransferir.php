<?php

require "../Conta.php";

$contaUm = new Conta();
$contaDois = new Conta();

$contaUm->depositar(434);

$contaUm->transferir(200, $contaDois);
var_dump($contaUm);
var_dump($contaDois);