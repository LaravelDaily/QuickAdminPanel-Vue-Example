<?php

namespace App\Http\Requests;

use App\Models\ContactContact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_contact_create');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'integer',
                'exists:contact_companies,id',
                'required',
            ],
            'contact_first_name' => [
                'string',
                'nullable',
            ],
            'contact_last_name' => [
                'string',
                'nullable',
            ],
            'contact_phone_1' => [
                'string',
                'nullable',
            ],
            'contact_phone_2' => [
                'string',
                'nullable',
            ],
            'contact_email' => [
                'string',
                'nullable',
            ],
            'contact_skype' => [
                'string',
                'nullable',
            ],
            'contact_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
