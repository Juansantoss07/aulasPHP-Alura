<?php 

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Conta\Conta;
class ContaPoupanca extends Conta
{
    // Como somos obrigado a chamar o método abstrato e completarmos o método aqui, iremos fazer isso. 
    protected function percentualTarifa()
    {
        return 0.03;
    }
}