<?php

namespace App\Http\Requests\Backend;

use App\Rules\Price;
use App\Enums\EProductStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * {@inheritdoc}
     */
    public function messages()
    {
        return [
            'price.required_if' => __('The current price field is required when status is Active.'),
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'code' => ['required', 'string', 'min:3', 'max:255', Rule::unique('shop_products')->ignore($this->product)],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['string', 'nullable', 'max:10000'],
            'status' => ['required', 'integer'],
            'brand_id' => ['required', 'integer'],
            'old_price' => ['nullable', new Price],
            'price' => ['nullable', new Price, 'required_if:status,==,' . EProductStatuses::ACTIVE],

            'main_category_id' => ['required', 'integer'],

            'meta_title' => ['string', 'nullable', 'max:255'],
            'meta_description' => ['string',  'nullable', 'max:255'],
            'meta_keywords' => ['string', 'nullable', 'max:255'],
        ];

        return $rules;
    }

}
