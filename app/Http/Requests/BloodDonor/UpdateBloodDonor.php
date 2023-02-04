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
            'name' => [
                'required', 'string', 'max:255'
            ],
            'hb' => [
                'required', 'string', 'max:255'
            ],
            'tm' => [
                'required', 'string', 'max:255'
            ],
            'bb' => [
                'required', 'string', 'max:255'
            ],
        ];
    }
}
