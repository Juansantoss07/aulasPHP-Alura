<?php
namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Funcionario\Funcionario;

class Diretor extends Funcionario
{
    public function calculaBonificacao()
    {
        $this->retornaSalario()*2;
    }

    public function autenticarBonificacao($senha):bool
    {
        return $senha === "123456";
    }
}