<?php

namespace App\Http\Requests\Backend;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesRequest extends FormRequest
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
            'parent_id' => ['integer', 'nullable', 'exists:shop_categories,id'],
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('shop_categories')->ignore($this->category)],
            'slug' => ['required', new Slug, Rule::unique('shop_categories')->ignore($this->category)],
            'description' => ['string', 'nullable', 'max:10000'],

            'meta_title' => ['string', 'nullable', 'max:255'],
            'meta_description' => ['string',  'nullable', 'max:255'],
            'meta_keywords' => ['string', 'nullable', 'max:255'],
        ];
    }

}
