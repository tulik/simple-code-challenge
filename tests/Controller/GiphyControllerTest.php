<?php

declare(strict_types=1);

use App\Tests\AbstractWebTestCase;
use Symfony\Component\HttpFoundation\Request;

class GiphyControllerTest extends AbstractWebTestCase
{
    protected $term;

    protected function setUp()
    {
        $this->term = $this->faker->word;
    }

    public function testGetRandomGiphyReturnsJson()
    {
        $this->client->request(
            Request::METHOD_GET,
            '/v1/gifs/random'
        );

        $this->assertTrue(
            $this->client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );
    }

    public function testGetRandomGiphyHasTitle()
    {
        $this->client->request(
            Request::METHOD_GET,
            '/v1/gifs/random'
        );

        $responseContent = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('title', $responseContent);
    }

    public function testGetRandomGiphyHasUrl()
    {
        $this->client->request(
            Request::METHOD_GET,
            '/v1/gifs/random'
        );

        $responseContent = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('url', $responseContent);
    }

    public function testGetSearchGiphyReturnsJson()
    {
        $this->client->request(
            Request::METHOD_GET,
            sprintf('/v1/gifs/search/%s', $this->term)
        );

        $this->assertTrue(
            $this->client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );
    }

    public function testGetSearchGiphyTitleIsValid()
    {
        $this->client->request(
            Request::METHOD_GET,
            sprintf('/v1/gifs/search/%s', $this->term)
        );

        $responseContent = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertSame('title', array_search($this->term, $responseContent));
    }

    public function testGetSearchGiphyHasUrl()
    {
        $this->client->request(
            Request::METHOD_GET,
            sprintf('/v1/gifs/search/%s', $this->term)
        );

        $responseContent = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('url', $responseContent);
    }
}
