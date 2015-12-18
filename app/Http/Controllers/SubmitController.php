<?php

namespace App\Http\Controllers;

use App\Links;
use App\Category;
use Illuminate\Http\Request;
use App\Events\LinkWasSubmitted;

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
        $this->validate($request, $this->validationRules());

        $link = Links::create([
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
        ]);

        // Notify
        event(new LinkWasSubmitted($link));

        return redirect('/')->with(['status' => 'Link submitted for approval']);
    }

    /**
     * @return array
     */
    protected function validationRules()
    {
        return [
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }

}
