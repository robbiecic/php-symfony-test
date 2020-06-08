<?php

namespace App\Controller;

use App\Utils\RequestWrapper;
use Symfony\Component\Routing\Annotation\Route;
use App\Classes\Person;

class PersonController
{
    /**
      * @Route("/returnPerson/{fullname}", methods={"GET","HEAD"})
    */
    public function getPerson(string $fullname): JsonResponse
    {
        $requestWrapper = new RequestWrapper();
        try {
            $this->parseNameParameter($fullname);
            $split_string = explode('.', $fullname);
            $firtname = $split_string[0];
            $surname = $split_string[1];
            $person = new Person($firtname, $surname);
            return $requestWrapper->returnJsonResponse($person);
        } catch (\InvalidArgumentException $e) {
            return $requestWrapper->returnJsonError(400, $e->getMessage());
        }
    }

    /**
    * @Route("/createPerson", methods=["POST"]
    */
    public function createPerson(): JsonResponse
    {
        $requestWrapper = new RequestWrapper();
        try {
            $body = $requestWrapper->getRequestBodyContent();
            $firstname = $requestWrapper->requireBodyValue($body, 'firstname');
            $surname = $requestWrapper->requireBodyValue($body, 'surname');
            $person = new Person($firstname, $surname);
            return $requestWrapper->returnJsonResponse($person);
        } catch (\InvalidArgumentException $e) {
            return $requestWrapper->returnJsonError(400, $e->getMessage());
        }
    }

    private function parseNameParameter(string $param): void
    {
        $numberOfStopsInString = substr_count($param, '.');
        if ($numberOfStopsInString != 1) {
            throw new \InvalidArgumentException('Does not contain the right number of stop characters. Must contain 1 that splits the firstname and surname.');
        }
    }
}
