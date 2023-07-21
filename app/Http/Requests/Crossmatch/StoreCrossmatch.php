<?php

namespace App\Http\Requests\Crossmatch;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class StoreCrossmatch extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('crossmatch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'blood_type_id' => [
                'required', 'integer'
            ],
            'fase1' => [
                'required', 'string', 'max:255'
            ],
            'fase2' => [
                'required', 'string', 'max:255'
            ],
            'fase3' => [
                'required', 'string', 'max:255'
            ],
            'result' => [
                'nullable', 'string', 'max:255'
            ],
        ];
    }
}
