<?php
require_once "../autoload.php";

use Alura\Banco\Modelo\Funcionario\{Desenvolvedor, Gerente};
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Service\ControladorDeBonificacoes;

$umFuncionario = new Desenvolvedor(
    new Cpf("123.456.789-10"),
    "Silvio Meireles",
    2000  
);

$UmaFuncionaria = new Gerente(
    new Cpf("098.765.432-10"),
    "Ana Luisa",
    8350
);

$adicionarBonificacoes = new ControladorDeBonificacoes();
$adicionarBonificacoes->adicionarBonificacoes($umFuncionario);
$adicionarBonificacoes->adicionarBonificacoes($UmaFuncionaria);

echo $adicionarBonificacoes->retornaTotal();

/*
    Polimorfismo:
    O conceito de polimorfismo é bem complexo, mas básicamente segue da seguinte forma:
        Se uma classe extende de outra classe, então ela faz referência a classe pai, e pode ter vários tipos. 
    
        Exemplo:
        O método "adicionarBonificacoes() espera como argumento um argumento do tipo "Funcionario", mas estamos passando nas linhas 21 e 22 desse arquivo, um argumento do tipo "Desenvolvedor" e do tipo "Gerente".
        Mas isso não resultaria em um erro? 
        Nesse caso não, pois "Desenvolvedor" e "Gerente" são tipos diferentes, classes diferentes, mas elas extendem de "Funcionário", ou seja, ambos são "Funcionários" também, portanto está correto passarmos esses tipos como argumento, nesse caso. 
*/

