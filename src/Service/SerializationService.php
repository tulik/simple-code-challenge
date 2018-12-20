<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializationService
{
    /**
     * @var array
     */
    protected $encoders;

    /**
     * @var array
     */
    protected $normalizers;

    public function __construct()
    {
        $this->encoders = [new JsonEncoder()];
        $this->normalizers = [new ObjectNormalizer()];
    }

    /**
     * @return Serializer
     */
    public function getSerializer(): SerializerInterface
    {
        return $serializer = new Serializer($this->normalizers, $this->encoders);
    }

    /**
     * @param \stdClass $object
     *
     * @return string
     */
    public function serialize($object): string
    {
        return $this->getSerializer()->serialize($object, 'json');
    }

    /**
     * @todo: Should be possible to pass HTTP Response code
     *
     * @param \stdClass $object
     *
     * @return JsonResponse
     */
    public function getJsonResponse($object): JsonResponse
    {
        $jsonResponse = new JsonResponse($this->serialize($object), Response::HTTP_OK, [], true);

        return $jsonResponse;
    }
}
