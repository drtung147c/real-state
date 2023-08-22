<?php

namespace App\Http\Controllers\Admin;

use App\Tags;
use App\Authors;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use App\Http\Resources\PermissionResource;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies(PermissionResource::NEWS_ACCESS), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news               = News::all();
        $permissionResource = new PermissionResource();

        return view('admin.news.index', compact('news', 'permissionResource'));
    }

    public function create()
    {
        abort_if(Gate::denies(PermissionResource::NEWS_CREATE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tags::all()->pluck('name', 'id');
        $authors = Authors::all()->pluck('name', 'id');

        return view('admin.news.create', compact('tags', 'authors'));
    }

    public function store(StoreNewsRequest $request)
    {
        $request->merge(['slug' => Str::slug($request->get('slug'))]);
        $news = News::create($request->all());
        $news->tags()->sync($request->input('tags', []));
        $news->authors()->sync($request->input('authors', []));

        if ($request->input('photo', false)) {
            $news->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.news.index');
    }

    public function edit(News $news)
    {
        abort_if(Gate::denies(PermissionResource::NEWS_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tags::all()->pluck('name', 'id');
        $authors = Authors::all()->pluck('name', 'id');
        $news->load('tags', 'authors');

        return view('admin.news.edit', compact('news', 'tags', 'authors'));
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $request->merge(['slug' => Str::slug($request->get('slug'))]);
        $news->update($request->all());
        $news->tags()->sync($request->input('tags', []));
        $news->authors()->sync($request->input('authors', []));

        if ($request->input('photo', false)) {
            if (!$news->photo || $request->input('photo') !== $news->photo->file_name) {
                $news->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($news->photo) {
            $news->photo->delete();
        }

        return redirect()->route('admin.news.index');
    }

    public function show(News $news)
    {
        abort_if(Gate::denies(PermissionResource::NEWS_SHOW), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news->load('tags', 'authors');

        return view('admin.news.show', compact('news'));
    }

    public function destroy(News $news)
    {
        abort_if(Gate::denies(PermissionResource::NEWS_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsRequest $request)
    {
        News::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function upload(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path     = $request->file('file')->storeAs('uploads', $fileName, 'public');

        return response()->json(['location' => "/storage/$path"]);
    }
}
