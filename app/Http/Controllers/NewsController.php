<?php

namespace App\Http\Controllers;

use App\News;

class NewsController extends Controller
{
    public function index($slug)
    {
        $news = News::with('tags', 'authors')->where('slug', 'like','%' . $slug . '%')->firstOrFail();

        $newsLatest = News::where('slug', 'not like', '%' . $slug . '%')->latest()->take(3)->get();

        return view('new', compact('news', 'newsLatest'));
    }

    public function show($slug, $id)
    {
        $news = News::with('tags', 'authors')->where('slug', $slug)->where('id', $id)->firstOrFail();

        return view('new', compact('news'));
    }

    public function all()
    {
        $news = News::latest()->paginate(9);

        return view('news', compact('news'));
    }
}
