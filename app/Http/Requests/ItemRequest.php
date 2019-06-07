<?php

namespace KPO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'taxpayer_id'   => 'required|exists:taxpayers,id',
            'date'          => 'required|date',
            'description'   => 'required|max:50',
            'product_value' => 'nullable|required_without:service_value|regex:/^\d+(\.\d{1,2})?$/',
            'service_value' => 'nullable|required_without:product_value|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
