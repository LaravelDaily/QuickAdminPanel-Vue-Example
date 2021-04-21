<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactContactRequest;
use App\Http\Requests\UpdateContactContactRequest;
use App\Http\Resources\Admin\ContactContactResource;
use App\Models\ContactCompany;
use App\Models\ContactContact;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactContactsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactContactResource(ContactContact::with(['company'])->advancedFilter());
    }

    public function store(StoreContactContactRequest $request)
    {
        $contactContact = ContactContact::create($request->validated());

        return (new ContactContactResource($contactContact))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(ContactContact $contactContact)
    {
        abort_if(Gate::denies('contact_contact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'company' => ContactCompany::get(['id', 'company_name']),
            ],
        ]);
    }

    public function show(ContactContact $contactContact)
    {
        abort_if(Gate::denies('contact_contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactContactResource($contactContact->load(['company']));
    }

    public function update(UpdateContactContactRequest $request, ContactContact $contactContact)
    {
        $contactContact->update($request->validated());

        return (new ContactContactResource($contactContact))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ContactContact $contactContact)
    {
        abort_if(Gate::denies('contact_contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ContactContactResource($contactContact->load(['company'])),
            'meta' => [
                'company' => ContactCompany::get(['id', 'company_name']),
            ],
        ]);
    }

    public function destroy(ContactContact $contactContact)
    {
        abort_if(Gate::denies('contact_contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactContact->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
