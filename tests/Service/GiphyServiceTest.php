<?php

declare(strict_types=1);

use App\Model\Giphy;
use App\Service\GiphyService;
use App\Tests\AbstractWebTestCase;

class GiphyServiceTest extends AbstractWebTestCase
{
    public function testGiphyForTermReturnValidGif()
    {
        $giphyService = new GiphyService();

        $term = $this->faker->word;

        $giphy = new Giphy();

        try {
            $giphy = $giphyService->getGiphyForTerm($term);
        } catch (Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }

        $this->assertTrue($giphy->getTitle() === $term);
    }
}
