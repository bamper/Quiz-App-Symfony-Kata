<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OneSetControllerTest extends WebTestCase
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

    /**
     * @dataProvider dataProviderUsers
     */
    public function testEnteringQuiz($login, $pass, $text, $checker){

        $client = static::createClient();
        $client->followRedirects();

        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Zaloguj się')->form();

        $form['email'] = $login;
        $form['pass']  = $pass;

        $crawler = $client->submit($form);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals($num,
            $crawler->filter('html:contains("'.$text.'")')->count());
    }

    public function dataProviderUsersForQuiz()
    {
        return array(
            array('test1@test.pl', 'nSiZel8S',
                array(
                    'after_login' => "Nie możesz brać powtórnie udziału w tym etapie.",
                    'after_login_text_count' => 1,
                    'can_quiz' => false,
                    'click_go' => 'Rozpocznij test',
                    'number_of_radios' => 0,
                    'number_of_checkboxes' => 0,
                    'click_end' => 'Nie możesz brać powtórnie udziału w tym etapie.'
                )),
            array('test2@test.pl', 'nSiZel8S',
                array(
                    'after_login' => "Przygotuj się.",
                    'after_login_text_count' => 1,
                    'can_quiz' => true,
                    'click_go' => 'Rozpocznij test',
                    'number_of_radios' => 2,
                    'number_of_checkboxes' => 1,
                    'click_end' => 'Zapisz'
                )),
            array('test3@test.pl', 'nSiZel8S', array(
                'after_login' => "Przygotuj się.",
                'after_login_text_count' => 1,
                'can_quiz' => true,
                'click_go' => 'Rozpocznij test',
                'number_of_radios' => 2,
                'number_of_checkboxes' => 1,
                'click_end' => 'Zapisz'
            )),
            array('test3@test.pl', 'nSiZsel8S',
                array(
                    'after_login' => "Złe dane logowania.",
                    'after_login_text_count' => 1,
                    'can_quiz' => false,
                    'click_go' => 'Rozpocznij test',
                    'number_of_radios' => 2,
                    'number_of_checkboxes' => 1,
                    'click_end' => 'Witamy. Użyj adresu'
                )),
            array('test3@test.pl', 'nSiZel8S' , array(
                'after_login' => "Złe dane logowania.",
                'after_login_text_count' => 0,
                'can_quiz' => true,
                'click_go' => 'Rozpocznij test',
                'number_of_radios' => 2,
                'number_of_checkboxes' => 1,
                'click_end' => 'Zapisz'
            ))
        );
    }

    public function dataProviderUsers()
    {
        return array(
            array('test1@test.pl', 'nSiZel8S', "Nie możesz brać powtórnie udziału w tym etapie.", 1),
            array('test2@test.pl', 'nSiZel8S', "Przygotuj się.", 1),
            array('test3@test.pl', 'nSiZel8S', "Przygotuj się.", 1),
            array('test3@test.pl', 'nSiZsel8S', "Złe dane logowania.", 1),
            array('test3@test.pl', 'nSiZel8S' , "Złe dane logowania.", 0)
        );
    }
}
