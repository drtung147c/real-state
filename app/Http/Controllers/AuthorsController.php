<?php

namespace App\Http\Controllers;

use App\Authors;
use App\News;

class AuthorsController extends Controller
{
    public function index($slug)
    {
        $authors = Authors::with('news')->where('slug', $slug)->firstOrFail();
        $news = News::with('authors')
                    ->whereHas('authors', function ($q) use ($slug) {
                        $q->where('authors.slug', $slug);
                    })
                    ->latest()
                    ->paginate(9);

        return view('authors', compact('authors', 'news'));
    }
}
