<?php 

require "Conta.php";

$contaUm = new Conta();
/* Qual a diferença de classe e objeto? 
A diferença é simples, classe é a classe que montamos, com as prioridades (Atributos), funções, etc. A partir do momento que chamamos nossa classe atribuindo ela a uma variável, então estamos criando um objeto do tipo da nossa classe, no exemplo, estamos criando  um objeto do tipo Conta. 
*/

$contaUm->cpfTitular = "343.156.383-49";
$contaUm->nomeTitular = "Santos Cunha";
$contaUm->saldo = 7324.86;

var_dump($contaUm);

// Quando trabalhamos com objetos, não temos cópias de valores, mas sim referências. Por exemplo:
$a = 4;
$b = $a;
/* No caso acima, criamos duas variáveis, note que a variável $b recebe como valor a variável $a, mas como nesse caso estamos atribuindo valores a ela, se mudarmos o valor de $b, não iremos alterar o valor da variável $a, isso porquê o computador alocou os dois valores em dois espaços (endereços) diferentes na memória. Agora no exemplo abaixo:
*/
$c = $contaUm;
// Aqui estamos atribuindo o valor de $contaUm a variável $c, mas como $contaUm é um objeto, ela só tem como valor o endereço desse objeto, então $c está apontando agora para o mesmo objeto, logo se mudarmos o valor de alguma propriedade através do $c, vai refletir também em $contaUm.

