<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class StoreRouteRequest extends FormRequest
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
            'name' => 'required|string|max:255',//nullable
            'route' => 'required|string|max:255|unique:routes,route',
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
            if (!Route::has($this->all()['route'])) {
                $validator->errors()->add('route', 'La ruta ingresada no existe');
            }
        });
    }
}