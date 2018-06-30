<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:30',
            'username' => 'required|max:12'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.max'  => 'A title should be less then 30 charts',
            'username.required' => 'A username is required'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->mapValidate($validator)) {
                $validator->errors()->add('map', 'Set the place where you are find the target');
            }
        });
    }

    /**
     * @param \Illuminate\Validation\Validator $validator
     * @return bool
     */
    public function mapValidate($validator) {
        $lat = $validator->getData()['lat'];
        $lng = $validator->getData()['lng'];

        return (empty($lat) && empty($lng));
    }
}
