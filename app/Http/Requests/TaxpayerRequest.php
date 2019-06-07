<?php

namespace KPO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxpayerRequest extends FormRequest
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
        if (explode('@', $this->route()->getActionName())[1] === 'update') {
            return [
                'id'    => 'required|numeric|unique:taxpayers,id,' . $this->route()->parameter('taxpayer')->id,
                'name'  => 'required',
                'place' => 'required',
            ];
        }

        return [
            'id'    => 'required|numeric|unique:taxpayers',
            'name'  => 'required',
            'place' => 'required',
        ];
    }
}
