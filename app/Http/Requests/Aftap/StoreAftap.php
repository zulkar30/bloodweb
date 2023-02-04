<?php

namespace App\Http\Requests\Aftap;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreAftap extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('aftap_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'officer_id' => [
                'required', 'integer',
            ],
            'donor_id' => [
                'required', 'integer',
            ],
            'pouch_type_id' => [
                'required', 'integer',
            ],
            'blood_type_id' => [
                'required', 'integer'
            ],
            'volume' => [
                'required', 'string', 'max:255'
            ]
        ];
    }
}
