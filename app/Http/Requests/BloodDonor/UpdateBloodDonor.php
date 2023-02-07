<?php

namespace App\Http\Requests\BloodDonor;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class UpdateBloodDonor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('blood_donor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'nullable', 'integer',
            ],
            'blood_type_id' => [
                'nullable', 'integer'
            ],
            'pouch_type_id' => [
                'nullable', 'integer'
            ],
            'donor_type_id' => [
                'nullable', 'integer'
            ],
            'donor_id' => [
                'nullable', 'integer'
            ],
            'gender' => [
                'nullable', 'string', 'max:255'
            ],
            'age' => [
                'nullable', 'string', 'max:255'
            ],
            'donor_reaction' => [
                'nullable', 'string', 'max:255'
            ],
            'retrieval_process' => [
                'nullable', 'string', 'max:255'
            ],
            'donor_status' => [
                'nullable', 'string', 'max:255'
            ]
        ];
    }
}
