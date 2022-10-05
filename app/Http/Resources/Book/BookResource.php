<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
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
            'title' => $this->title,
            'author' => new AuthorResource($this->author),
            'created_at' => $this->created_at,
        ];
    }
}
