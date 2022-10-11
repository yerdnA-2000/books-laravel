<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\Author\AuthorWithoutUserResource;
use App\Models\Author;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'api_token' => $this->when(Auth::user()->hasRole('author'), $this->api_token),
            'author' => new AuthorWithoutUserResource($this->author),
        ];
    }
}
