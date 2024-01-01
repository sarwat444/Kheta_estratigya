<?php

namespace App\Http\Requests\Web\Admin\mokashers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMokasherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'type' => ['required'],
            'program_id' => ['sometimes'] ,
            'addedBy' => ['sometimes']
        ];
    }
}
