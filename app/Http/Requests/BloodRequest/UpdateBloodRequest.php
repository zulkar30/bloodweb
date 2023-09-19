<?php

namespace App\Http\Requests\BloodRequest;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class UpdateBloodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('blood_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'wb' => [
                'nullable', 'string', 'max:255'
            ],
            'we' => [
                'nullable', 'string', 'max:255'
            ],
            'prc' => [
                'nullable', 'string', 'max:255'
            ],
            'tc' => [
                'nullable', 'string', 'max:255'
            ],
            'ffp' => [
                'nullable', 'string', 'max:255'
            ],
            'cry' => [
                'nullable', 'string', 'max:255'
            ],
            'plasma' => [
                'nullable', 'string', 'max:255'
            ],
            'prp' => [
                'nullable', 'string', 'max:255'
            ],
            'total' => [
                'nullable', 'string', 'max:255'
            ],
            'info' => [
                'nullable', 'string', 'max:255'
            ],
            'fulfilled' => [
                'nullable', 'string', 'max:255'
            ],
            'status' => [
                'nullable', 'string', 'max:255'
            ],
            'patient_id' => [
                'nullable', 'integer',
            ],
            'officer_id' => [
                'nullable', 'integer',
            ],
            'doctor_id' => [
                'nullable', 'integer',
            ],
        ];
    }
}
