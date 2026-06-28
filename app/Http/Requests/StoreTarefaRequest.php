<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTarefaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tarefa' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'prioridade' => 'required|in:baixa,media,alta',
        ];
    }

    public function messages(): array
    {
        return [
            'tarefa.required' => 'A tarefa precisa ter um nome',
            'tarefa.max' => 'A tarefa pode ter no máximo 255 caracteres',

            'descricao.string' => 'A descrição deve ter um texto válido',

            'prioridade.required' => 'É obrigatório definir uma prioridade',
            'prioridade.in' => 'A prioridade informada é inválida.',
        ];
    }
}
