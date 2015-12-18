<?php

namespace App\Http\Controllers;

use App\Links;
use App\Category;
use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('submit.index', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        Links::create([
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
        ]);

        return redirect('/')->with(['status' => 'Link submitted for approval']);
    }
}
