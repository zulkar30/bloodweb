<?php

namespace App\Http\Requests\Crossmatch;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;

// Middleware
use Gate;

class UpdateCrossmatch extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('crossmatch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'integer',
            ],
            'blood_type_id' => [
                'integer'
            ],
            'fase1' => [
                'string', 'max:255'
            ],
            'fase2' => [
                'string', 'max:255'
            ],
            'fase3' => [
                'string', 'max:255'
            ],
            'result' => [
                'string', 'max:255'
            ],
        ];
    }
}
