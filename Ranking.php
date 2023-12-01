<?php

class Ranking extends SplHeap {
// Aqui é uma classe que está extendendo de uma collection SplHeap, ela é uma collection com métodos para comparação.
    public function compare(Musica $musica1, Musica $musica2)
    //Quando usamos o SplHeap, precisamos obrigatoriamente passar o método compare, passando dois valores como argumento para comparar.
    {
        if($musica1->getVezesTocadas() === $musica2->getVezesTocadas()){
            return 0;
        }

        if($musica1->getVezesTocadas() < $musica2->getVezesTocadas()){
            return -1;
        } else {
            return 1;
        }
    }
    // Na condicional acima realizamos algumas comparações, se as vezes tocadas de musica 1 é igual as vezes tocadas de musica2, retorna 0. Se as vezes tocadas de musica1 é menor que as vezes tocadas de musica2 retorna -1, se não retorna 1.
}