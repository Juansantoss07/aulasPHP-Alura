<?php 

// Aula sobre Set e Map
// Com o set, como o nome já propôs, é quando iremos adicionar na lista o item.

require "Album.php"; // Aqui estamos requerindo a nossa classe Album
require "Musica.php"; // Aqui estamos requerindo a nossa classe Musica

$albuns = new SplObjectStorage; // Estanciamos uma collection, essa collection serve para armazenarmos objetos, ou seja, $albuns é uma lista de objetos. *Ele aceita apenas objetos, não aceita nenhum outro tipo de dado. 

$divide = new Album("Divide"); // Aqui estanciamos o objeto Album, passando como argumento o nome do album. 

$albuns->attach($divide); // Aqui usamos o método attach() da nossa collection SplObjectStorage, para adicionarmos esse objeto na nossa lista de objetos.

$divide = new Album("Divide"); // Repare que estamos repetindo esse código, isso não resultará em nada, pois essa colecttion não permite duplicidade do mesmo objeto, no nosso exemplo estamos usando album, então se estanciarmos o Album em uma outra variável, ai sim vamos poder setar ela dentro da lista de objetos, mesmo que duplicada.



// Agora iremos realizar o map, para interagirmos entre as musicas dos nossos albuns.

// Vamos criar outro album primeiro:
$scorpios = new Album("Scorpions");
// Agora temos dois albuns, o Scorpios e o Divide.

// Vamos criar a variável musicas do album divide e a variável para musicas do album Scorpios.
$musicasDivide = new SplFixedArray(2); // Aqui criamos a variável e definimos um valor fixo de 2 para a lista.

$musicasDivide[0] = new Musica("Shape of you");
$musicasDivide[1] = new Musica("Castle on the Hill");
// Criamos então dois objetos música e colocamos na lista.

$musicasScorpion = new SplFixedArray(2);

$musicasScorpion[0] = new Musica("Peak");
$musicasScorpion[1] = new Musica("Summer Games");
// Criamos então dois objetos música e colocamos na lista.

$albuns[$divide] = $musicasDivide;
$albuns[$scorpios] = $musicasScorpion;
// Aqui atribuímos a lista $musicasDivide ao objeto $albuns na posição "$divide" e a lista $musicasScorpios ao objeto $albuns na posição "$scorpios".

// Agora precisamos iterar sobre eles para exibir na tela cada album e cada música do album:
foreach($albuns as $album){

    echo "Album: " . $album->getNome() . "<br>";

    foreach($albuns[$album] as $musicas){

        echo "Música: " . $musicas->getNome() . "<br>" ;
    }

    echo "<br>";
}

// O que realizamos foi um foreach dentro de um outro foreach, observe o que está sendo feito.  Para cada item na lista $albuns iremos armazenar na variável $album, para cada album iremos exibir com o echo a string com o nome do album, chamando a função getNome. Em seguida é feito outro foreach, pois para cada $albuns na posiçaõ $albuns que ficará armezenado na variável $musica, será exibido com echo uma string com seu nome, usando a função getNome. 

