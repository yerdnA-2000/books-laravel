<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Services\Author\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
