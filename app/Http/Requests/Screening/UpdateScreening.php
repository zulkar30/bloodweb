<?php

namespace App\Http\Requests\Screening;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class UpdateScreening extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('screening_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'hiv' => [
                'nullable', 'string', 'max:255'
            ],
            'hcv' => [
                'nullable', 'string', 'max:255'
            ],
            'hbsag' => [
                'nullable', 'string', 'max:255'
            ],
            'vdrl' => [
                'nullable', 'string', 'max:255'
            ],
            'result' => [
                'nullable', 'string', 'max:255'
            ],
        ];
    }
}
