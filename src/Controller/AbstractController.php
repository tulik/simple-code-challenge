<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\SerializationService;

abstract class AbstractController
{
    protected $serializationService;

    public function __construct(SerializationService $serializationService)
    {
        $this->serializationService = $serializationService;
    }
}
