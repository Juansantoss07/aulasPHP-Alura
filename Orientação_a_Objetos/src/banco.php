<?php

require "Conta.php";
require "Titular.php";
require "Cpf.php";

$primeiraConta = new Conta( new Titular( new Cpf("413.675.785-43") , "Mateus"));
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo $primeiraConta->recuperaNomeTitular(); // Chamando método para retornar o cpf do titular da conta e o exibindo com echo
echo $primeiraConta->recuperaCpfTitular(); // Chamando método para retornar o nome do titular da conta e o exibindo com echo
echo $primeiraConta->retornarSaldo(); // Chamando método para retornar o saldo e o exibindo com echo

$segundaConta = new Conta( new  Titular( new Cpf("253.586.364-45"), "Ana Luisa")); // Aqui vai resultar no erro após a verificação do nome, que precisa ser maior que 5 caracteres.
