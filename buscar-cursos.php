<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Vituvitamina\BuscadorCursos\Buscador;

$client = new Client();
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);

$cursos = $buscador->search('https://alura.com.br/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}