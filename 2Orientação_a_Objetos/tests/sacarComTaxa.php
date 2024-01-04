<?php

require_once "../autoload.php";

use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;

$contaComTaxa = new Conta(new Titular(new Cpf("123.456.789-10"), "Juan Dias", new Endereco("Rua La", "Bairro cá", "Mauá", "254")));

$contaComTaxa->depositar(500);

$contaComTaxa->sacar(200);

echo $contaComTaxa->retornarSaldo();