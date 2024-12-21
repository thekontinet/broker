<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function index(?string $page = 'welcome') {
        if(!View::exists($page)) {
            throw new NotFoundHttpException();
        }
        return view($page);
    }
}
