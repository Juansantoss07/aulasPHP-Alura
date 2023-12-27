<?php

class Conta // Aqui criamos uma classe, uma classe pode ser um tipo também.
{
    // Iremos criar aqui as propriedades da nossa classe. 

    // Note que temos propriedades public e private, isso serve para decidirmos se nossa propriedade vai poder ser acessada fora do arquivo ou somente dentro do arquivo. No caso da propriedade $saldo por exemplo, não podemos deixa-la como pública para que não ocorra o risco de alteração no valor do saldo em outro lugar do código fora desse arquivo.
    public string $cpfTitular;
    public string $nomeTitular;
    private float $saldo = 0; // Aaui estamos atribuindo o valor 0 para saldo, assim sempre que criarmos uma conta nova, o saldo já virá como 0. 

    // Todas essas prioridades são variáveis que chamamos de atributos da nossa classe
    
    public function sacar(float $valor)
    {
        if($valor > $this->saldo){
            echo "Você não possui saldo sulficiente, seu saldo é de R$" . $this->saldo;
        } else {
            $this->saldo -= $valor;
            echo "O valor de R$" . $valor . " foi sacado de sua conta <br>. Seu saldo atual é R$" . $this->saldo; 
        }
    }

    public function depositar(float $valor):void
    {
        if($valor <= 0){
            echo "Você só pode depositar valores acima de R$0,01";
        } else {
            $this->saldo += $valor;
            echo "O valor de R$" . $valor . " foi depositado. <br> Seu saldo atual é de R$" . $this->saldo;
        }
    }

    public function transferir(float $valorParaTransferir, object $contaDestino):void
    {
        if($valorParaTransferir > $this->saldo){
            echo "Saldo insulficiente.";
            return;
        }
        
        $this->sacar($valorParaTransferir);
        $contaDestino->depositar($valorParaTransferir);

        // Note que não usamos o else aqui, é sempre recomendado o não uso dele, já que usando "return" a verficação para. 
    }
}