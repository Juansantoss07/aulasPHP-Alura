<?php

class Conta // Aqui criamos uma classe, uma classe pode ser um tipo também.
{
    // Iremos criar aqui as propriedades da nossa classe. 

    // Note que temos propriedades public e private, isso serve para decidirmos se nossa propriedade vai poder ser acessada fora do arquivo ou somente dentro do arquivo. No caso da propriedade $saldo por exemplo, não podemos deixa-la como pública para que não ocorra o risco de alteração no valor do saldo em outro lugar do código fora desse arquivo.
    public string $cpfTitular;
    public string $nomeTitular;
    private float $saldo;

    // Todas essas prioridades são variáveis que chamamos de atributos da nossa classe
    
    public function Sacar(float $valor)
    {
        if($valor > $this->saldo){
            echo "Você não possui saldo sulficiente, seu saldo é de R$" . $this->saldo;
        } else {
            $this->saldo -= $valor;
            echo "O valor de R$" . $valor . " foi sacado de sua conta <br>. Seu saldo atual é R$" . $this->saldo; 
        }
    }
}