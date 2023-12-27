<?php

class Conta // Aqui criamos uma classe, uma classe pode ser um tipo também.
{
    // Iremos criar aqui as propriedades da nossa classe. 

    // Note que temos propriedades public e private, isso serve para decidirmos se nossa propriedade vai poder ser acessada fora do arquivo ou somente dentro do arquivo. No caso da propriedade $saldo por exemplo, não podemos deixa-la como pública para que não ocorra o risco de alteração no valor do saldo em outro lugar do código fora desse arquivo.
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo; 
    // Todas essas prioridades são variáveis que chamamos de atributos da nossa classe
    private static $numeroDeContasCriadas = 0;

    public function __construct(string $cpf, string $nome)
    {
        $this->cpfTitular = $cpf;
        $this->nomeTitular = $nome;
        $this->saldo = 0; // Aaui estamos atribuindo o valor 0 para saldo, assim sempre que criarmos uma conta nova, o saldo já virá como 0. 
        $this->validaNomeTitular($nome);
        

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

    public function retornarNomeTitular()
    {
        return $this->nomeTitular;
    }

    public function retornarCpfTitular()
    {
        return $this->cpfTitular;
    }


    private function validaNomeTitular($nome)
    {
        if(strlen($nome) <= 5){
            echo "O nome precisa ter ao menos 6 caracteres.";
            exit();
        }
    }

    private static function retornarNumeroDeContasCriadas()
    {
        return self::$numeroDeContasCriadas;
    }
}