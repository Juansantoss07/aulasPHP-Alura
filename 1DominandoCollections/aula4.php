<?php
 
require "Ranking.php";
require "TocadorDeMusica.php";
require "Musica";

$musicas = new SplFixedArray(4);

$musicas[0] = new Musica("One Dance");
$musicas[1] = new Musica("Closer");
$musicas[2] = new Musica("Rockstar");
$musicas[3] = new Musica("love yourself");

$tocador = new TocadorDeMusica();

$tocador->adicionarMusicas($musicas);

$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->avancarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->avancarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->avancarMusica();
$tocador->tocarMusica();

$tocador->exibiRanking();