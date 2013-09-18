<?php

namespace CCC\templateBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class templateControllerTest extends WebTestCase
{
    public function testForms()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Go to INDEX
        $crawler = $client->request('GET', '/email-template/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /email-template/");
        $this->assertTrue($crawler->filter('html:contains("email templates")')->count() > 0);
        
        // Go to CREATE entity
        $crawler = $client->click($crawler->selectLink('create new email template')->link());
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /email-template/new");
        $this->assertTrue($crawler->filter('html:contains("create new email template")')->count() > 0);
        
        // CREATE entity 
        $form = $crawler->selectButton('ccc_email_template[submit]')->form();
        $form['ccc_email_template[title]'] = 'New title';
        $form['ccc_email_template[template]'] = 'New email template';
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        
        // SHOW the entity
        $this->assertGreaterThan(0, $crawler->filter('h1:contains("New title")')->count(), 'Missing element h1:contains("New title")');
        $this->assertGreaterThan(0, $crawler->filter('dd:contains("New email template")')->count(), 'Missing element dd:contains("New email template")');

        // Go to EDIT for entity
        $crawler = $client->click($crawler->selectLink('edit')->link());
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /email-template/1/edit");
        $this->assertTrue($crawler->filter('html:contains("edit email template")')->count() > 0);
        
        // EDIT the entity
        $form = $crawler->selectButton('ccc_email_template[submit]')->form();
        $form['ccc_email_template[title]'] = 'New title updated';
        $form['ccc_email_template[template]'] = 'New email template updated';
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        
        // SHOW the entity
        $this->assertGreaterThan(0, $crawler->filter('h1:contains("New title updated")')->count(), 'Missing element h1:contains("New title updated")');
        $this->assertGreaterThan(0, $crawler->filter('dd:contains("New email template updated")')->count(), 'Missing element dd:contains("New email template updated")');

        // DELETE the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();
        
        // DELETE confirmation
        $this->assertNotRegExp('/New title/', $client->getResponse()->getContent());
    }
}
