<?php

namespace App\Http\Requests\BloodRequest;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreBloodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('blood_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'doctor_id' => [
                'required', 'integer',
            ],
            'patient_id' => [
                'required', 'integer',
            ],
            'blood_type_id' => [
                'required', 'integer'
            ],
            'wb' => [
                'required', 'string', 'max:255'
            ],
            'we' => [
                'required', 'string', 'max:255'
            ],
            'prc' => [
                'required', 'string', 'max:255'
            ],
            'tc' => [
                'required', 'string', 'max:255'
            ],
            'ffp' => [
                'required', 'string', 'max:255'
            ],
            'cry' => [
                'required', 'string', 'max:255'
            ],
            'plasma' => [
                'required', 'string', 'max:255'
            ],
            'prp' => [
                'required', 'string', 'max:255'
            ],
            'total' => [
                'required', 'string', 'max:255'
            ],
            'fulfilled' => [
                'nullable', 'string', 'max:255'
            ],
            'status' => [
                'nullable', 'string', 'max:255'
            ]
        ];
    }
}
