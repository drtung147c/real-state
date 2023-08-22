<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTagsRequest;
use App\Http\Requests\StoreTagsRequest;
use App\Http\Requests\UpdateTagsRequest;
use App\Tags;
use App\Http\Resources\PermissionResource;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies(PermissionResource::TAGS_ACCESS), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags               = Tags::all();
        $permissionResource = new PermissionResource();

        return view('admin.tags.index', compact('tags', 'permissionResource'));
    }

    public function create()
    {
        abort_if(Gate::denies(PermissionResource::TAGS_CREATE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tags.create');
    }

    public function store(StoreTagsRequest $request)
    {
        $request->merge(['slug' => Str::slug($request->get('slug'))]);
        Tags::create($request->all());

        return redirect()->route('admin.tags.index');
    }

    public function edit(Tags $tag)
    {
        abort_if(Gate::denies(PermissionResource::TAGS_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagsRequest $request, Tags $tag)
    {
        $request->merge(['slug' => Str::slug($request->get('slug'))]);
        $tag->update($request->all());

        return redirect()->route('admin.tags.index');
    }

    public function show(Tags $tag)
    {
        abort_if(Gate::denies(PermissionResource::TAGS_SHOW), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tags.show', compact('tag'));
    }

    public function destroy(Tags $tag)
    {
        abort_if(Gate::denies(PermissionResource::TAGS_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tag->delete();

        return back();
    }

    public function massDestroy(MassDestroyTagsRequest $request)
    {
        Tags::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
