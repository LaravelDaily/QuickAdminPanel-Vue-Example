<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactCompanyRequest;
use App\Http\Requests\UpdateContactCompanyRequest;
use App\Http\Resources\Admin\ContactCompanyResource;
use App\Models\ContactCompany;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactCompanyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactCompanyResource(ContactCompany::advancedFilter());
    }

    public function store(StoreContactCompanyRequest $request)
    {
        $contactCompany = ContactCompany::create($request->validated());

        return (new ContactCompanyResource($contactCompany))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(ContactCompany $contactCompany)
    {
        abort_if(Gate::denies('contact_company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(ContactCompany $contactCompany)
    {
        abort_if(Gate::denies('contact_company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactCompanyResource($contactCompany);
    }

    public function update(UpdateContactCompanyRequest $request, ContactCompany $contactCompany)
    {
        $contactCompany->update($request->validated());

        return (new ContactCompanyResource($contactCompany))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ContactCompany $contactCompany)
    {
        abort_if(Gate::denies('contact_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ContactCompanyResource($contactCompany),
            'meta' => [],
        ]);
    }

    public function destroy(ContactCompany $contactCompany)
    {
        abort_if(Gate::denies('contact_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactCompany->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
