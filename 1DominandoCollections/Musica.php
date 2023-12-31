<?php

class Musica{

    private $nome;
    private $vezesTocadas;

    public function __construct($name)
    {
        $this->nome = $name; // Quando chamarmos essa classe temos que passar um argumento musica, a propriedade $this->name recebe o valor desse argumento.
        $this->vezesTocadas = 0; // Ao chamarmos a classe, a propriedade $this->vezesTocadas é inicializada em 0.
    }

    public function getNome()
    {
        // Nessa função estamos retornando o nome da musica.
        return $this->nome;
    }

    public function getVezesTocadas()
    {
        // Nessa função estamos retornando as vezes tocadas.
        return $this->vezesTocadas; 
    }

    public function tocar()
    {
        // Nessa função icrementamos o vezes tocadas sempre que chamada a função para o valor atual somar +1.
        $this->vezesTocadas++;
    }
    
    public function __toString()
    {
        // Agora nosso musica->current() nos retorna um objeto, pois haviamos refatorado ele. Para que continue retornando como string podemos usar o método do PHP __toString(), nessa função iremos retornar a propriedade $this->nome, que irá retornar uma string.
        return $this->nome;
    }
}