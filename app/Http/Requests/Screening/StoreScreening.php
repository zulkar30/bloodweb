<?php

namespace App\Http\Requests\Screening;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreScreening extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('screening_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'hiv' => [
                'required', 'string', 'max:255'
            ],
            'hcv' => [
                'required', 'string', 'max:255'
            ],
            'hbsag' => [
                'required', 'string', 'max:255'
            ],
            'vdrl' => [
                'required', 'string', 'max:255'
            ],
            'result' => [
                'required', 'string', 'max:255'
            ],
            'officer_id' => [
                'required', 'integer',
            ],
            'aftap_id' => [
                'required', 'integer',
            ]
        ];
    }
}
