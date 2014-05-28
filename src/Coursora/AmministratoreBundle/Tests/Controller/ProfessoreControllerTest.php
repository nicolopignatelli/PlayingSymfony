<?php

namespace Coursora\AmministratoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfessoreControllerTest extends WebTestCase
{
    public function testRegistraGet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/amministratore/professore/registra');

        $this->assertTrue($crawler->filter('html:contains("Registra professore")')->count() > 0);
    }

    public function testListaGet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/amministratore/professore/lista');

        $this->assertTrue($crawler->filter('html:contains("Lista professori")')->count() > 0);
    }

    public function testRegistraPost()
    {
        $client = static::createClient();

        $client->request('POST', '/amministratore/professore/registra');

        $this->assertTrue($client->getResponse()->isRedirect('/amministratore/professore/lista'));
    }
}
