<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'f_name'    => 'required',
            'l_name'    => 'required',
            'email'     => 'required|email',
            'body'      => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
