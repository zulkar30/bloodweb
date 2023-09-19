<?php

namespace App\Http\Requests\Donor;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreDonor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('donor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'no_reg' => [
                'nullable', 'string', 'max:255'
            ],
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
            'photo' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
            'status' => [
                'nullable', 'string', 'max:255'
            ],
            'profession_id' => [
                'required', 'integer'
            ],
            'blood_type_id' => [
                'required', 'integer'
            ]
        ];
    }
}
