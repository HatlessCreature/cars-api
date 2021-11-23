<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
{

    private $ENGINES = [
        'petrol',
        'diesel',
        'electric',
        'hybrid'
    ];
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
            'brand' => 'min:2',
            'model' => 'min:2',
            'year' => 'integer',
            'max_speed' => 'integer|between:20,300',
            'is_automatic' => 'boolean',
            'engine' => 'in:' . implode(',', $this->ENGINES),
            'number_of_doors' => 'integer|between:2,9',
        ];
    }
}
