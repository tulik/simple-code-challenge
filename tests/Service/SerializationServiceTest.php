<?php

declare(strict_types=1);

use App\Service\SerializationService;
use App\Tests\AbstractWebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;

class SerializationServiceTest extends AbstractWebTestCase
{
    public function testGetSerializerReturnValidType()
    {
        $serializationService = new SerializationService();

        $serializer = $serializationService->getSerializer();

        $this->assertTrue($serializer instanceof Serializer);
    }

    public function testSerializeToJsonReturnsString()
    {
        $serializer = new SerializationService();

        $object = new \stdClass();

        $serializedObject = $serializer->serialize($object);

        $this->assertTrue(is_string($serializedObject));
    }

    public function testGetJsonResponseReturnsValidType()
    {
        $serializer = new SerializationService();

        $object = new \stdClass();

        $jsonResponse = $serializer->getJsonResponse($object);

        $this->assertTrue($jsonResponse instanceof JsonResponse);
    }
}
