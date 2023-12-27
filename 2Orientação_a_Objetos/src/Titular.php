<?php

class Titular extends Pessoa
{
    private Endereco $endereco;


    public function __construct(Cpf $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }

    public function retornaEnderecoTitular() :Endereco
    {
        return $this->endereco;
    }

}