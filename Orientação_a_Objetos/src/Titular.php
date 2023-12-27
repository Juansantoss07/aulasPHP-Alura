<?php

class Titular
{
    private Cpf $cpf;
    private string $nome;


    public function __construct(Cpf $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;

        $this->validaNomeTitular($nome);
    }

    public function retornarNome() :string
    {
        return $this->nome;
    }

    public function retornarCpf() :string
    {
        return $this->cpf->retornaCpf();
    }


    private function validaNomeTitular($nome) :void
    {
        if(strlen($nome) <= 5){
            echo "O nome precisa ter ao menos 6 caracteres.";
            exit();
        }
    }

}