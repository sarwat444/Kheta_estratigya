<?php

namespace App\Http\Requests\Web\Admin\users;

use Illuminate\Foundation\Http\FormRequest;

class StoremokasharatInputs extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => 'required|string', // Adjust the validation rules as needed
            'year_one' => 'required|integer',
            'year_two' => 'required|integer',
            'year_three' => 'required|integer',
            'year_four' => 'required|integer',
            'year_five' => 'required|integer',
            'target' => 'required|numeric',
            'mokasher_id' =>'required'
        ];
    }
}
