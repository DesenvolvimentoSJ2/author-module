<?php

namespace Modules\Author\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuthorFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author_name' => 'required|string|min:2|max:255',
            'author_birthday' => 'required|date|before:today|date_format:Y-m-d',
            'author_picture' => 'nullable|image|mimes:jpeg,png,bmp,gif,svg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'author_name.required' => 'O campo nome do autor é obrigatório.',
            'author_name.string' => 'O nome do autor deve ser um texto.',
            'author_name.min' => 'O nome do autor deve ter pelo menos 2 caracteres.',
            'author_name.max' => 'O nome do autor pode ter no máximo 255 caracteres.',

            'author_birthday.required' => 'O campo data de nascimento é obrigatório.',
            'author_birthday.date' => 'A data de nascimento deve ser uma data válida.',
            'author_birthday.before' => 'A data de nascimento deve ser anterior à data de hoje.',
            'author_birthday.date_format' => 'A data de nascimento deve estar no formato AAAA-MM-DD.',

            'author_picture.image' => 'A imagem deve ser um arquivo de imagem válido.',
            'author_picture.mimes' => 'A imagem deve ser do tipo: jpeg, png, bmp, gif, svg, webp.',
            'author_picture.max' => 'A imagem não pode ser maior que 2048 kilobytes (2MB).',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
