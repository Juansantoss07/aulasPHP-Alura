<?php

require "Conta.php";

$primeiraConta = new Conta("413.675.785-43", "Mateus");
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo $primeiraConta->retornarCpfTitular(); // Chamando método para retornar o cpf do titular da conta e o exibindo com echo
echo $primeiraConta->retornarNomeTitular(); // Chamando método para retornar o nome do titular da conta e o exibindo com echo
echo $primeiraConta->retornarSaldo(); // Chamando método para retornar o saldo e o exibindo com echo