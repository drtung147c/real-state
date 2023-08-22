<?php

namespace App\Http\Controllers;

use App\Tags;
use App\News;

class TagsController extends Controller
{
    public function index($slug)
    {
        $tags = Tags::where('slug', $slug)->firstOrFail();
        $news = News::with('tags')
                    ->whereHas('tags', function ($q) use ($slug) {
                        $q->where('tags.slug', $slug);
                    })
                    ->latest()
                    ->paginate(9);

        return view('tags', compact('tags', 'news'));
    }
}
