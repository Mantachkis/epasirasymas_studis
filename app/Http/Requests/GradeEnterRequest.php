<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeEnterRequest extends FormRequest
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
        foreach($this->except(['_token', 'valst-code']) as $key => $value){
            $rules[$key] = 'required|numeric|between:0,10';
        }
        return $rules;
    }

    public function messages()
    {
        foreach($this->except('_token') as $key => $value){
            $message[$key.'.required'] = 'Laukas yra privalomas';
            $message[$key.'.numeric'] = 'Laukas privalo būti skaitinės reikšmės';
            $message[$key.'.between'] = 'Reikšmė privalo būti tarp 0 ir 10';
        }

        return $message;
    }
}
