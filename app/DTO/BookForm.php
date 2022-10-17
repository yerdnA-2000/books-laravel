<?php

namespace App\DTO;

use Illuminate\Http\Request;

class BookForm
{
    public string $title;

    public int $author_id;

    public function __construct(string $title, int $author_id)
    {
        $this->setTitle($title);
        $this->setAuthorId($author_id);
    }

    /**
     * @param Request $request
     * @return BookForm
     */
    public static function fromRequest(Request $request): BookForm
    {
        return new static(
            $request->get('title'),
            $request->get('author_id'),
        );
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * @param int $author_id
     */
    public function setAuthorId(int $author_id): void
    {
        $this->author_id = $author_id;
    }
}
