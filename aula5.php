<?php 

// Aula sobre Set e Map
// Com o set, como o nome já propôs, é quando iremos adicionar na lista o item.

require "Album.php"; // Aqui estamos requerindo a nossa classe Album

$albuns = new SplObjectStorage; // Estanciamos uma collection, essa collection serve para armazenarmos objetos, ou seja, $albuns é uma lista de objetos. *Ele aceita apenas objetos, não aceita nenhum outro tipo de dado. 

$divide = new Album("Divide"); // Aqui estanciamos o objeto Album, passando como argumento o nome do album. 

$albuns->attach($divide); // Aqui usamos o método attach() da nossa collection SplObjectStorage, para adicionarmos esse objeto na nossa lista de objetos.

$divide = new Album("Divide"); // Repare que estamos repetindo esse código, isso não resultará em nada, pois essa colecttion não permite duplicidade do mesmo objeto, no nosso exemplo estamos usando album, então se estanciarmos o Album em uma outra variável, ai sim vamos poder setar ela dentro da lista de objetos, mesmo que duplicada.
