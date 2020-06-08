<?php

namespace App\Controller;

use App\Utils\RequestWrapper;
use Symfony\Component\Routing\Annotation\Route;

class GenerateRandomNumber
{
    /**
      * @Route("/genNumber")
    */
    public function genNumber(): JsonResponse
    {
        $requestWrapper = new RequestWrapper();
        $number = $this->returnRandomInteger(1, 100);
        $return_object = ['randomNumber' => $number];
        return $requestWrapper->returnJsonResponse($return_object);
    }

    public function returnRandomInteger($min, $max): int
    {
        return rand($min, $max);
    }
}
