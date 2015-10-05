<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NoSetControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0,
             $crawler->filter('html:contains("Witamy. Użyj adresu email, na który otrzymałeś wiadomość oraz hasła w niej zawartego, by kontynuować test.")')->count());

        $crawler = $client->request('GET', '/before');

        $this->assertGreaterThan(0,
            $crawler->filter('html:contains("Witamy. Użyj adresu email, na który otrzymałeś wiadomość oraz hasła w niej zawartego, by kontynuować test.")')->count());


        $crawler = $client->request('GET', '/quiz');
        $this->assertGreaterThan(0,
            $crawler->filter('html:contains("Witamy. Użyj adresu email, na który otrzymałeś wiadomość oraz hasła w niej zawartego, by kontynuować test.")')->count());


        $crawler = $client->request('GET', '/thx');
        $this->assertGreaterThan(0,
            $crawler->filter('html:contains("Witamy. Użyj adresu email, na który otrzymałeś wiadomość oraz hasła w niej zawartego, by kontynuować test.")')->count());

    }

    /**
     * @dataProvider dataProviderUsers
     */
    public function testLogin($login, $pass, $text, $num){

        $client = static::createClient();
        $client->followRedirects();

        $crawler = $client->request('GET', '/');



        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0,
            $crawler->filter('html:contains("Witamy. Użyj adresu email, na który otrzymałeś wiadomość oraz hasła w niej zawartego, by kontynuować test.")')->count());


        $form = $crawler->selectButton('Zaloguj się')->form();

        $form['email'] = $login;
        $form['pass']  = $pass;

        $crawler = $client->submit($form);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals($num,
            $crawler->filter('html:contains("'.$text.'")')->count());
    }


    public function dataProviderUsers()
    {
        return array(
            array('test1@test.pl', 'nSiZel8S', "Quiz się skończył.", 1),
            array('test2@test.pl', 'nSiZel8S', "Quiz się skończył.", 1),
            array('test3@test.pl', 'nSiZel8S', "Quiz się skończył.", 1),
            array('test3@test.pl', 'nSiZsel8S', "Złe dane logowania.", 1),
            array('test3@test.pl', 'nSiZel8S', "Złe dane logowania.", 0)
        );
    }
}
