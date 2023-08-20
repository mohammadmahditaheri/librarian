<?php

namespace App\Services\Books\Http\Resources;

use App\Data\Resources\SingleNameResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publisher_id' => $this->publisher_id,
            'publisher' => new SingleNameResource(
                $this->whenLoaded('publisher')
            ),
            'category_id' => $this->category_id,
            'category' => new SingleNameResource(
                $this->whenLoaded('category')
            ),
            'language_id' => $this->language_id,
            'language' => new SingleNameResource($this->whenLoaded('language')
            ),
            'authors' => SingleNameResource::collection(
                $this->whenLoaded('authors')
            ),
            'copies' => CopyResource::collection(
                $this->whenLoaded('copies')
            ),

            'description' => $this->description,
            'published_at_year' => $this->published_at_year,
            'number_of_pages' => $this->number_of_pages,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
