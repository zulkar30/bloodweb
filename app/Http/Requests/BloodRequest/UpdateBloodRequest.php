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
                'required', 'string', 'max:255'
            ],
        ];
    }
}
