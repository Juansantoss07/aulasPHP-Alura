<?php 

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Conta\Conta;
class ContaCorrente extends Conta
{
    protected function percentualTarifa()
    {
        return 0.05;
    }
}