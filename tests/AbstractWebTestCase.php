<?php

declare(strict_types=1);

namespace App\Tests;

use Faker\Factory;
use Faker\Generator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

abstract class AbstractWebTestCase extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Generator
     */
    protected $faker;

    /**
     * AbstractWebTestCase constructor.
     *
     * @param string|null $name
     * @param array       $data
     * @param string      $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->client = static::createClient();
        $this->faker = Factory::create();
    }
}
