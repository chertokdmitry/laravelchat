<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function index()
    {
//        echo URL::signedRoute('log', ['user' => 2]);
//
        $view = view('index')->render();
        return (new Response($view));
    }
}
