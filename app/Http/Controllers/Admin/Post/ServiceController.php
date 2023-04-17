<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Service\PostService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $service;


    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

}
