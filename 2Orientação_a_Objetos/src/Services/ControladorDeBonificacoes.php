<?php 

require_once "../../autoload.php";

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private float $totalBonificacoes = 0;

    public function adicionarBonificacoes(Funcionario $funcionario)
    {
       $this->totalBonificacoes = $funcionario->calculaBonificacao();
    }


    public function retornaTotal():float
    {
        return $this->totalBonificacoes;
    }
}