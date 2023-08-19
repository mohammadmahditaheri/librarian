<?php

namespace App\Foundation\ValueObjects\Responses;

use Symfony\Component\HttpFoundation\Response;

class ResponseValues
{
    public function __construct(
        public int|null $statusCode = null,
        public bool|null $isSuccessful = null,
        public string|null $message = null,
        public mixed $data = null,
        public mixed $extra = null
    )
    {
    }

    public function succeed(): ResponseValues
    {
        return $this->setIsSuccessful(true);
    }

    public function fail(): ResponseValues
    {
        return $this->setIsSuccessful(false);
    }

    public function setOk(): ResponseValues
    {
        return $this->setStatusCode(Response::HTTP_OK);
    }

    public function setNotFoundStatus(): ResponseValues
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND);
    }

    public function setServerErrorStatus(): ResponseValues
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * ------------------------------------------------
     * --------------- Fluent Setters -----------------
     * ------------------------------------------------
     */

    public function setStatusCode(?int $statusCode): ResponseValues
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function setIsSuccessful(?bool $isSuccessful): ResponseValues
    {
        $this->isSuccessful = $isSuccessful;
        return $this;
    }

    public function setMessage(?string $message): ResponseValues
    {
        $this->message = $message;
        return $this;
    }

    public function setData(mixed $data): ResponseValues
    {
        $this->data = $data;
        return $this;
    }

    public function setExtra(mixed $extra): ResponseValues
    {
        $this->extra = $extra;
        return $this;
    }
}
