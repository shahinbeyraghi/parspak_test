<?php
/**
 * Created by PhpStorm.
 * User: SHAHIN
 * Date: 4/26/2020
 * Time: 8:54 PM
 */

namespace App\Core\File;


use Illuminate\Foundation\Http\FormRequest;

class CreateUserFileRequest extends FormRequest
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
            'file_name' => 'required|bail|alpha_num|max:32',
        ];
    }

    public function messages()
    {
        return [
            'file_name.required' => 'a file name is required',
            'file_name.alpha_num'  => 'you should use a-z or 0-9 characters',
        ];
    }
}