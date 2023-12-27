<?php

class Conta // Aqui criamos uma classe, uma classe pode ser um tipo também.
{
    // Iremos criar aqui as propriedades da nossa classe. 


    private $titular;
    // Note que temos propriedades public e private, isso serve para decidirmos se nossa propriedade vai poder ser acessada fora do arquivo ou somente dentro do arquivo. No caso da propriedade $saldo por exemplo, não podemos deixa-la como pública para que não ocorra o risco de alteração no valor do saldo em outro lugar do código fora desse arquivo.
    private float $saldo; 
    // Todas essas prioridades são variáveis que chamamos de atributos da nossa classe
    private static $numeroDeContasCriadas = 0;

    public function __construct(Titular $titular)
    {
        $this->saldo = 0; // Aaui estamos atribuindo o valor 0 para saldo, assim sempre que criarmos uma conta nova, o saldo já virá como 0. 
        $this->titular = $titular;

        self::$numeroDeContasCriadas++;
        echo self::retornarNumeroDeContasCriadas();
    }

    public function __destruct()
    {
        self::$numeroDeContasCriadas--;
        // Com esse método mágico, sempre que não tivermos mais o objeto em questão, vai ser executado o código que inserirmos aqui.
    }

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
        
        $this->sacar($valorParaTransferir); // Chamamos dessa forma, pois nesse caso o $this faz referência ao objeto que chamou o método.
        $contaDestino->depositar($valorParaTransferir);

    }

    public function retornarSaldo()
    {
        return $this->saldo;
    }

    private static function retornarNumeroDeContasCriadas()
    {
        return self::$numeroDeContasCriadas;
    }

    public function recuperaNomeTitular()
    {
        return $this->titular->retornarNome();
    }

    public function recuperaCpfTitular()
    {
        return $this->titular->retornarCpf();
    }

    public function retornaTitular():Titular
    {
        return $this->titular;
    }
}