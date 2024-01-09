<?php 

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\Cpf;

abstract class Funcionario extends Pessoa
{
    private float $salario;

    public function __construct(Cpf $cpf, string $nome, float $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }
 
    public function alterarNome(string $nomeNovo):void
    {
        $this->validaNomePessoa($nomeNovo);
        $this->nome = $nomeNovo;
    }

    public function calculaBonificacao()
    {
        $this->salario *= 0.01;
    }

    public function retornaSalario(){
        return $this->salario;
    }

    public function recebeAumento($valorAumento):void
    {
        if($valorAumento <= 0){
            echo "Insira um valor maior que zero para continuar";
            return;
        }

        $this->salario += $valorAumento;
    }
}