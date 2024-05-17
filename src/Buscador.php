<?php

namespace Vituvitamina\BuscadorCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $client, Crawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    public function search(string $url): array
    {
        $response = $this->client->request('GET', $url);
        $this->crawler->addHtmlContent($response->getBody());

        $obj = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($obj as $curso) {
            array_push($cursos, $curso->textContent);
        }

        return $cursos;
    }
}
