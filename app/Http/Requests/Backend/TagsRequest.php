<?php

namespace App\Http\Requests\Backend;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagsRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('shop_tags')->ignore($this->tag)],
            'slug' => ['required', new Slug, Rule::unique('shop_tags')->ignore($this->tag)],
        ];
    }

}
