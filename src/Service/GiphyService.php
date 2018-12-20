<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Giphy;
use Faker\Factory;
use Faker\Generator;

class GiphyService
{
    public const API_KEY = 'P97eGigBLXrVl7D194KeR68G6gPl8oya';
    public const URL = 'http://api.giphy.com/v1/gifs/search?q=';

    /**
     * @var Generator
     */
    protected $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * @param string $term
     *
     * @throws \Exception
     *
     * @return Giphy
     */
    public function getGiphyForTerm(string $term): Giphy
    {
        $url = sprintf('%s%s&api_key=%s',
            self::URL,
            $term,
            self::API_KEY
        );

        $apiResponse = file_get_contents($url);

        if (false === $apiResponse) {
            throw new \Exception(
                sprintf('Cannot get response from %s', $url)
            );
        }

        $apiResponse = json_decode($apiResponse);

        $data = array_pop($apiResponse->data);

        if (empty($data->url)) {
            throw new \Exception(
                sprintf('Cannot find Giphy for %s', $term)
            );
        }

        $giphy = new Giphy();

        $giphy->setTitle($term);
        $giphy->setUrl($data->url);

        return $giphy;
    }

    /**
     * @throws \Exception
     *
     * @return Giphy
     */
    public function getGiphyForRandomTerm(): Giphy
    {
        $randomTerm = $this->faker->word;

        try {
            $giphy = $this->getGiphyForTerm($randomTerm);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $giphy;
    }
}
