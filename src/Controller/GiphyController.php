<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\GiphyService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/v1/gifs")
 */
class GiphyController extends AbstractController
{
    /**
     * @Route(path="/random", name="api_gif_random", methods={Request::METHOD_GET})
     *
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function randomGiphy(Request $request): JsonResponse
    {
        $giphyService = new GiphyService();
        $giphy = $giphyService->getGiphyForRandomTerm();

        return $this->serializationService->getJsonResponse($giphy);
    }

    /**
     * @Route(path="/search/{term}", name="api_gif_for_term", methods={Request::METHOD_GET})
     *
     * @param Request $request
     * @param string  $term
     *
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function searchGiphy(Request $request, string $term): JsonResponse
    {
        $giphyService = new GiphyService();
        $giphy = $giphyService->getGiphyForTerm($term);

        return $this->serializationService->getJsonResponse($giphy);
    }
}
