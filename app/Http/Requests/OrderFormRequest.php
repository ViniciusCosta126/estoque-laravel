<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'customer_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14'],
            'status' =>  ['required', 'in:pending,processing,completed,cancelled'],
            'total_amount' => ['required'],
            'items' => ['required', 'array'],
            'items.*.item_id' => ['required', 'exists:items,id'],
            'items.*.quantity' =>  ['required', 'integer', 'min:1'],
            'items.*.price' => ['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'customer_name.required' => 'O nome do cliente é obrigatório.',
            'customer_name.string' => 'O nome do cliente deve ser uma string.',
            'customer_name.max' => 'O nome do cliente não pode exceder 255 caracteres.',

            'phone_number.required' => 'O número de telefone é obrigatório.',
            'phone_number.string' => 'O número de telefone deve ser uma string.',
            'phone_number.max' => 'O número de telefone não pode exceder 15 caracteres.',

            'address.required' => 'O endereço é obrigatório.',
            'address.string' => 'O endereço deve ser uma string.',
            'address.max' => 'O endereço não pode exceder 255 caracteres.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.string' => 'O CPF deve ser uma string.',
            'cpf.max' => 'O CPF não pode exceder 14 caracteres.',

            'status.required' => 'O status é obrigatório.',
            'status.in' => 'O status deve ser um dos seguintes: pending, processing, completed, cancelled.',

            'total_amount.required' => 'O valor total é obrigatório.',

            'items.required' => 'Os itens são obrigatórios.',
            'items.array' => 'Os itens devem ser um array.',

            'items.*.item_id.required' => 'O ID do item é obrigatório.',
            'items.*.item_id.exists' => 'O item selecionado não existe.',

            'items.*.quantity.required' => 'A quantidade do item é obrigatória.',
            'items.*.quantity.integer' => 'A quantidade do item deve ser um número inteiro.',
            'items.*.quantity.min' => 'A quantidade do item deve ser pelo menos 1.',

            'items.*.price.required' => 'O preço do item é obrigatório.',
        ];
    }
}
