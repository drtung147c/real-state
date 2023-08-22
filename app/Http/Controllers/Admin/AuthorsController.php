<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAuthorsRequest;
use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;
use App\Authors;
use App\Http\Resources\PermissionResource;
use Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AuthorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies(PermissionResource::AUTHORS_ACCESS), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors            = Authors::all();
        $permissionResource = new PermissionResource();

        return view('admin.authors.index', compact('authors', 'permissionResource'));
    }

    public function create()
    {
        abort_if(Gate::denies(PermissionResource::AUTHORS_CREATE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.authors.create');
    }

    public function store(StoreAuthorsRequest $request)
    {
        $request->merge(['slug' => Str::slug($request->get('slug'))]);
        Authors::create($request->all());

        return redirect()->route('admin.authors.index');
    }

    public function edit(Authors $author)
    {
        abort_if(Gate::denies(PermissionResource::AUTHORS_EDIT), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.authors.edit', compact('author'));
    }

    public function update(UpdateAuthorsRequest $request, Authors $author)
    {
        $request->merge(['slug' => Str::slug($request->get('slug'))]);
        $author->update($request->all());

        return redirect()->route('admin.authors.index');
    }

    public function show(Authors $author)
    {
        abort_if(Gate::denies(PermissionResource::AUTHORS_SHOW), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.authors.show', compact('author'));
    }

    public function destroy(Authors $author)
    {
        abort_if(Gate::denies(PermissionResource::AUTHORS_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $author->delete();

        return back();
    }

    public function massDestroy(MassDestroyAuthorsRequest $request)
    {
        Authors::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
