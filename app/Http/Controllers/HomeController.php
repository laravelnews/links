<?php

namespace App\Http\Controllers;

use App\Links;
use App\Http\Requests;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home', [
            'links' => Links::recent(),
        ]);
    }
}
