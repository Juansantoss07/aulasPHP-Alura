<?php 

namespace Alura\Banco\Modelo;
class Funcionario extends Pessoa
{
    private string $cargo;

    public function __construct(Cpf $cpf, string $nome, string $cargo)
    {
        parent::__construct($nome, $cpf);
        $this->cargo = $cargo;
    }
 
    public function retornaCargo():string
    {
        return $this->cargo;
    }

    public function alterarNome(string $nomeNovo):void
    {
        $this->validaNomePessoa($nomeNovo);
        $this->nome = $nomeNovo;
    }
}