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
            'background'    => 'nullable|string|min:5|max:500',
            'category_id'   => 'required|integer',
            'company'       => 'nullable|string|min:2|max:255',
            'address'       => 'nullable|string|min:2|max:255',
            'facebook'      => 'nullable|string|min:5|max:255',
            'twitter'       => 'nullable|string|min:5|max:255',
            'instagram'     => 'nullable|string|min:5|max:255',
            'linkedin'      => 'nullable|string|min:5|max:255'
        ];
    }
}
