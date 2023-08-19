<?php

namespace App\Contracts\DTO;

use App\Data\Models\Book;
use Illuminate\Http\Resources\Json\JsonResource;

interface BookDtoInterface
{
    public static function from(Book $book): ?BookDtoInterface;

    public function getModel(): ?Book;

    public function toArray(): array;

    public function getResourceClass(): string;

    public function wrapInResource(): JsonResource;
}
