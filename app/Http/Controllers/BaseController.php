<?php

namespace App\Http\Controllers;

use App\Sevices\Post\Services;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;
    public function __construct(Services $service)
    {
        $this->service = $service;
    }
}
