<?php

  //For correct syntax for using WUint checkout
  //http://www.yiiframework.com/extension/wunit
  //https://github.com/weavora/wunit
  class SiteTest extends WUnitTestCase
  {
      public function testIndex()
      {
          $client = static::createClient();
   
          $crawler = $client->request('GET', '/site/index');

          $client->followRedirects(true);
   
          $this->assertTrue($crawler->filter('html:contains("Congratulations!")')->count() > 0);


          $link = $crawler->filter('a:contains("Login")')->eq(0)->link();
          
          $crawler = $client->click($link);

          $this->assertEquals(200, $client->getResponse()->getStatusCode());
          
          $this->assertTrue($crawler->filter('html:contains("username or email")')->count() > 0);
      }
  }
