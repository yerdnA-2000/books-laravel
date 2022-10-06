<?php

namespace App\Http\Resources\Author;

use App\Http\Resources\Book\BookWithoutAuthorCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorWithBooksResource extends JsonResource
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

            'full_name' => $this->full_name,
            'books' => new BookWithoutAuthorCollection($this->books),
        ];
    }
}
