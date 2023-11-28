<?php 

require "TocadorDeMusica.php";


/* Com o objeto SplFixedArray nós definimos um tamanho fixo para o array, por exemplo no caso abaixo estamos definindo que o valor fixo de items do array será 2, caso adicionemos a posição 2, ou seja, mais que dois itens no array, isso resuultará em erro, pois o valor armazenado é fixo para 2. */
$musicas = new SplFixedArray(2);

$musicas[0] = "One Dance";
$musicas[1] = "Closer";

/* Chamando a função setSize() desse objeto, nós podemos atualizar o valor fixo de itens que o array conterá, nesse caso estamos mudando o valor fixo de 2 para 4.*/

$musicas->setSize(4);

$musicas[2] = "Rockstar";
$musicas[3] = "Love yourself";


/* Com a função getSize() do objeto, ela retorna o valor fixo atual do arraym ótimo para caso esquecermose quisermos saber*/
$musicas->getSize();

/* Podemos usar então echo com essa function para exibir na tela o valor*/
echo $musicas->getSize() . "<br>";

$tocador = new TocadorDeMusica();

$tocador->tocarMusica();
$tocador->adicionarMusica("Havana");
$tocador->avancarMusica();
$tocador->tocarMusica();
$tocador->exibirMusicas();
$tocador->exibirQuantidadeDeMusicas();
$tocador->adicionarMusicaNoComecoDaLista("Congragulations");
$tocador->exibirMusicas();
$tocador->adicionarMusicaNoComecoDaLista("Stan");
$tocador->exibirMusicas();
$tocador->avancarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();
$tocador->tocarMusica();
$tocador->removerMusicaDoComecoDaLista();
$tocador->exibirMusicas();