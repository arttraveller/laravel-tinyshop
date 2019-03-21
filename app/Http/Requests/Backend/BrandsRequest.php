<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandsRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('shop_brands')->ignore($this->brand)],
            'slug' => ['required', 'string', 'min:3', 'max:255', 'alpha_dash', Rule::unique('shop_brands')->ignore($this->brand)],

            'title' => ['string', 'nullable', 'max:255'],
            'description' => ['string',  'nullable', 'max:255'],
            'keywords' => ['string', 'nullable', 'max:255'],
        ];
    }

}
