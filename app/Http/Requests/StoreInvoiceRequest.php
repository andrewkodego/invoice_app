<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'inv_number' => 'required|unique:invoices|max:15',
            'inv_to'=> 'required|max:50',
            'inv_contact_number'=>'required|max:20',
            'inv_date'=>'required|date',
            'inv_currency'=>'required|integer',
            'inv_status'=>'required|integer',
            'inv_payment_method'=>'required|integer',
            'inv_delivery_address'=>'required|max:500',
        ];
    }
}
