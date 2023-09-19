<?php

namespace App\Http\Requests\BloodDonor;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreBloodDonor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('blood_donor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name' => [
                'nullable', 'string', 'max:255'
            ],
            'hb' => [
                'nullable', 'string', 'max:255'
            ],
            't_meter' => [
                'nullable', 'string', 'max:255'
            ],
            'bb' => [
                'nullable', 'string', 'max:255'
            ],
            'result' => [
                'nullable', 'string', 'max:255'
            ],
            'officer_id' => [
                'nullable', 'integer',
            ],
            'blood_type_id' => [
                'nullable', 'integer'
            ]
        ];
    }
}
