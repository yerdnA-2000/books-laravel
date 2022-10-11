<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\Author\AuthorWithoutUserResource;
use App\Http\Resources\Genre\GenreCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'author' => new AuthorWithoutUserResource($this->author),
            'genres' => new GenreCollection($this->genres),
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
