<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSellerApplicationRequest extends FormRequest
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
            'seller.first_name' => 'required|string|max:25',
            'seller.last_name' => 'required|string|max:25',
            'seller.portfolio_url' => 'required|url|unique:sellers,portfolio_url',
            'seller.shop_category' => 'required|string|max:50',
            'seller.has_online_store' => 'sometimes|boolean',
            'seller.author_content_confirmation' => 'required_if:has_online_store,true|boolean',
            'seller.perspective_on_quality' => 'required|string',
            'seller.experience_level' => 'required|string',
            'seller.understanding_of_business' => 'required',
        ];
    }
}
