<?php

namespace Tvision\Bundles\UserBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{     
    public function testLoginRoute()
    {        
        $client = static::createClient();
        $route = $this->getUrl('fos_user_security_login');        
        $crawler = $client->request('GET', $rotta);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }    
       
}
