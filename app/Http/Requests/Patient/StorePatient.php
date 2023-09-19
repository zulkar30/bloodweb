<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StorePatient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('patient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'required', 'string', 'max:255'
            ],
            'birth_place' => [
                'required', 'string', 'max:255'
            ],
            'birth_date' => [
                'required', 'string', 'max:255'
            ],
            'gender' => [
                'required', 'string', 'max:255'
            ],
            'contact' => [
                'required', 'string', 'max:255'
            ],
            'address' => [
                'required', 'string', 'max:255'
            ],
            'age' => [
                'required', 'string', 'max:255'
            ],
            'diagnosis' => [
                'required', 'string', 'max:255'
            ],
            'photo' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
            'room_id' => [
                'required', 'integer'
            ],
            'blood_type_id' => [
                'required', 'integer'
            ],
            'maintenance_section_id' => [
                'required', 'integer'
            ]
        ];
    }
}
