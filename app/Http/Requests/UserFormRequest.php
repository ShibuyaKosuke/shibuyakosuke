<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ShibuyaKosuke\LaravelDatabaseValidator\Facades\ValidationRule;

class UserFormRequest extends FormRequest
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
        return array_merge(
            ValidationRule::get('users'),
            [
                //
            ]
        );
    }

    public function attributes()
    {
        return array_merge(
            trans('columns.users'),
            [
                
            ]
        );
    }
}
