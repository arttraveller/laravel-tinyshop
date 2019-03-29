<?php

namespace App\Http\Requests\Backend;

use App\Rules\Slug;
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
            'slug' => ['required', new Slug, Rule::unique('shop_brands')->ignore($this->brand)],

            'meta_title' => ['string', 'nullable', 'max:255'],
            'meta_description' => ['string',  'nullable', 'max:255'],
            'meta_keywords' => ['string', 'nullable', 'max:255'],
        ];
    }

}
