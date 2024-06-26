<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "min:3"],
            "amount" => ["required", "digits_between:1,1000000"],
            "minimum_quantity" => ["required", "digits_between:1,100"],
            "max_quantity" => ["required", "digits_between:1,100"],
            "sale_price" => ["required", "min:1"],
            "cost_price" => ["required", "min:1"]
        ];
    }

    /**
     * 
     * @return array<string
     */
    public function messages(): array
    {
        return [
            "name.required" => "O nome é obrigatório",
            "name.min" => "O nome precisa ter no minimo 3 caracteres",
            "amount.required" => "A quantiade é obrigatória",
            "amount.digits_between" => "A quantidade precisa estar entre 1 e 1.000.000",
            "minimum_quantity.required" => "A quantiade minima é obrigatória",
            "minimum_quantity.digits_between" => "A quantidade minima precisa estar entre 1 e 100",
            "max_quantity.required" => "A quantidade maxima é obrigatória",
            "max_quantity.digits_between" => "A quantidade maxima precisa estar entre 1 e 100",
            "sale_price.required" => "O preço de venda é obrigatório",
            "sale_price.min" => "O preço de venda deve ser maior que 1",
            "cost_price.required" => "O preço de venda é obrigatório",
            "cost_price.min" => "O preço de venda deve ser maior que 1",
        ];
    }
}
