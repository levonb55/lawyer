<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReview extends FormRequest
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
//            'client_id' => 'required|integer|min:0',
//            'lawyer_id' => 'required|integer|min:0',
            'body'      => 'required|string|min:10|max:255',
            'grade'     => 'required|integer|min:1|max:5'
        ];
    }
}
