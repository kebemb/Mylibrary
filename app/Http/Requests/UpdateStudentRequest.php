<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'first_name' => "required",
            'last_name' => "required",
            'address' => "required",
            'gender' => "required",
            'class' => "required",
            'age' => "required",
            'phone' => "required",
            'email' => "required|email",
        ];
    }
}
