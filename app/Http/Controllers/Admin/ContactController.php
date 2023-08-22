<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Contact;
use App\Http\Resources\PermissionResource;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies(PermissionResource::CONTACT_ACCESS), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact = Contact::all();

        return view('admin.contact.index', compact('contact'));
    }

    public function show(Contact $contact)
    {
        abort_if(Gate::denies(PermissionResource::CONTACT_SHOW), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->load('venues');

        return view('admin.contact.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        abort_if(Gate::denies(PermissionResource::CONTACT_DELETE), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contact->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Contact::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
