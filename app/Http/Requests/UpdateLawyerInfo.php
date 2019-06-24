<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLawyerInfo extends FormRequest
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
            'image'         => 'nullable|image',
            'category_id'   => 'required|integer',
            'company'       => 'nullable|string|min:2|max:255',
            'state'         => 'nullable|string|min:2|max:255',
            'city'          => 'nullable|string|min:2|max:255',
            'address'       => 'nullable|string|min:2|max:255',
            'phone'         => 'nullable|string|min:2|max:255',
            'postcode'       => 'nullable|string|min:2|max:255',
            'company_website'   => 'nullable|url|min:2|max:255',
            'university'    => 'nullable|string|min:2|max:255',
            'experience'    => 'nullable|numeric|min:0',
            'background'    => 'nullable|string|min:5|max:500',
            'facebook'      => 'nullable|url|min:5|max:255',
            'twitter'       => 'nullable|url|min:5|max:255',
            'instagram'     => 'nullable|url|min:5|max:255',
            'linkedin'      => 'nullable|url|min:5|max:255'
        ];
    }
}
