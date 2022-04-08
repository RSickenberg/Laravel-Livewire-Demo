<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index(Request $request): Application|Factory|View
    {
        return view('demo.index');
    }
}
