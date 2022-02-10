<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:2|max:64',
            'email' => ['required','min:6','max:132','email',],
            'phone' => ['required','min:6','max:14'],
        ];

        if(!empty($this->user))
        {
            $rules['email'][] = Rule::unique('users')->ignore($this->user->id);
            $rules['phone'][] = Rule::unique('users')->ignore($this->user->id);
        }
        else
        {
            $rules['email'][] = Rule::unique('users');
            $rules['phone'][] = Rule::unique('users');
        }

        return $rules;
    }
}
