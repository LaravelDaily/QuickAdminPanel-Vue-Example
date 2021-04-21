<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_create');
    }

    public function rules()
    {
        return [
            'amount' => [
                'numeric',
                'nullable',
            ],
            'transaction_date' => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
        ];
    }
}
