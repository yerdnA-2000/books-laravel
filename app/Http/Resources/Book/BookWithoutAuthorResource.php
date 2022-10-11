<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Genre\GenreCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class BookWithoutAuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'genres' => new GenreCollection($this->genres),
        ];
    }
}
