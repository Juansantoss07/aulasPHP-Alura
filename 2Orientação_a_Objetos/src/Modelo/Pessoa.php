<?php

namespace Alura\Banco\Modelo;

use Alura\Banco\Modelo\Cpf;
class Pessoa
{
    protected string $nome;
    protected Cpf $cpf;

    public function __construct(string $nome, Cpf $cpf)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->validaNomePessoa($nome);
    }

    public function retornaNome():string
    {
        return $this->nome;
    }

    public function retornaCPF():string
    {
        return $this->cpf->retornaCpf();
    }

    protected function validaNomePessoa($nome) :void
    {
        if(strlen($nome) <= 5){
            echo "O nome precisa ter ao menos 6 caracteres.";
            exit();
        }
    }
}