<?php

namespace App\Http\Requests\Admin\CV;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Carbon\Carbon;

class CVCreateRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string'],
            'endereco' => ['required', 'string'],
            'genero' => ['required', 'in:masculino,feminino,outro'],
            'data_nascimento' => ['required', 'date'],
            'perfil_profissional' => ['required', 'string'],
        ];
    }

     public function messages(): array
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'endereco.required' => 'O campo Endereço é obrigatório.',
            'genero.required' => 'O campo Gênero é obrigatório.',
            'genero.in' => 'O campo Gênero deve ser Masculino, Feminino ou Outro.',
            'data_nascimento.required' => 'A Data de Nascimento é obrigatória.',
            'data_nascimento.date' => 'A Data de Nascimento deve ser uma data válida.',
            'perfil_profissional.required' => 'O campo Perfil Profissional é obrigatório.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function (Validator $validator) {
            if ($this->filled('data_nascimento')) {
                $idade = Carbon::parse($this->data_nascimento)->age;
                if ($idade < 17) {
                    $validator->errors()->add('data_nascimento', 'É necessário ter pelo menos 17 anos.');
                }
            }
        });
    }
}
