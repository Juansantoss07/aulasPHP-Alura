<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Pessoa;

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