<?php

namespace App\Utils;

use InvalidArgumentException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RequestWrapper
{
    public function returnJsonResponse(object $object): JsonResponse
    {
        return new JsonResponse($object);
    }

    public function getRequestBodyContent(): object
    {
        $request = Request::createFromGlobals();
        $content = json_decode($request->getContent());
        return $content;
    }

    public function returnJsonError(int $errorCode, string $message): JsonResponse
    {
        $response = new JsonResponse();
        $response->setContent(json_encode(array('message'->$message)));
        $response->setStatusCode($errorCode);
        return $response;
    }

    public function requireBodyValue(object $content, string $fieldName): string
    {
        try {
            return $content->$fieldName;
        } catch (\Exception $e) {
            throw new InvalidArgumentException('Field name - ' . $fieldName . ' was not provided.');
        }
    }
}
