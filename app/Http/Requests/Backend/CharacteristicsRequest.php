<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CharacteristicsRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('shop_characteristics')->ignore($this->characteristic)],
            'type' => ['required', 'integer'],
            'is_required' => ['required', 'boolean'],
            'default_value' => ['string', 'nullable', 'max:255'],
            'variants' => ['string', 'nullable', 'max:1000'],
            'sort' => ['integer', 'nullable'],
        ];
    }

}
