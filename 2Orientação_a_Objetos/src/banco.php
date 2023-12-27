<?php

require "Conta.php";
require "Titular.php";
require "Cpf.php";
require "Endereco.php";
require "Pessoa.php";

$endereco = new Endereco("Minha rua", "Meu bairro", "Mauá", "87A");
$primeiraConta = new Conta( new Titular( new Cpf("413.675.785-43") , "Mateus", $endereco));
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo $primeiraConta->recuperaNomeTitular(); // Chamando método para retornar o cpf do titular da conta e o exibindo com echo
echo $primeiraConta->recuperaCpfTitular(); // Chamando método para retornar o nome do titular da conta e o exibindo com echo
echo $primeiraConta->retornarSaldo(); // Chamando método para retornar o saldo e o exibindo com echo

$segundaConta = new Conta( new  Titular( new Cpf("253.586.364-45"), "Ana Luisa", $endereco)); // Aqui vai resultar no erro após a verificação do nome, que precisa ser maior que 5 caracteres.

var_dump($primeiraConta->retornaTitular()->retornaEnderecoTitular());