<?php

namespace App\Http\Controllers;

use App\Links;
use App\Category;
use Illuminate\Http\Request;
use App\Events\LinkWasSubmitted;

class SubmitController extends Controller
{
    /**
     * Make sure only logged in users can access.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the submission form.
     *
     * @return View
     */
    public function index()
    {
        return view('submit.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Save the link and notify the admin
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules());

        $link = $this->saveLink($request);

        event(new LinkWasSubmitted($link));

        return redirect('/')->with(['status' => 'Link submitted for approval']);
    }

    /**
     * @param Request $request
     * @return static
     */
    protected function saveLink(Request $request)
    {
        return Links::create([
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
        ]);
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
