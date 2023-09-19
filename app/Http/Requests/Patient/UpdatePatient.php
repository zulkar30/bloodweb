<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class UpdatePatient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('patient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'birth_place' => [
                'nullable', 'string', 'max:255'
            ],
            'birth_date' => [
                'nullable', 'string', 'max:255'
            ],
            'gender' => [
                'nullable', 'string', 'max:255'
            ],
            'contact' => [
                'nullable', 'string', 'max:255'
            ],
            'address' => [
                'nullable', 'string', 'max:255'
            ],
            'age' => [
                'nullable', 'string', 'max:255'
            ],
            'diagnosis' => [
                'nullable', 'string', 'max:255'
            ],
            'photo' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
            'room_id' => [
                'nullable', 'integer'
            ],
            'blood_type_id' => [
                'nullable', 'integer'
            ],
            'maintenance_section_id' => [
                'nullable', 'integer'
            ]
        ];
    }
}
