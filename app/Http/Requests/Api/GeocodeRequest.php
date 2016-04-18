<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GeocodeRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {

        return true;

    }

    /**
     * @return array
     */
    public function rules()
    {

        return [
            'post_id' => 'required|int',
        ];

    }
}
