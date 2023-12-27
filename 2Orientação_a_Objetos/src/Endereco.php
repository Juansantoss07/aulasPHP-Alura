<?php 

class Endereco
{
    private string $rua;
    private string $bairro;
    private string $cidade;
    private string $numero;


    public function __construct(string $rua, string $bairro, string $cidade, string $numero)
    {
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->numero = $numero;
    }

    public function retornaRua()
    {
        return $this->rua;
    }

    public function retornaBairro()
    {
        return $this->bairro;
    }

    public function retornaCidade()
    {
        return $this->cidade;
    }

    public function retornaNumero()
    {
        return $this->numero;
    }
}