<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponsavelRequest extends FormRequest
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
    $id = $this->route('id');
    return [
      'nm_responsavel' => 'required',
      'nr_inicial'     => 'required|numeric',
      'nr_final'      => 'required|numeric'
    ];
  }

  public function messages()
  {
      return[
        'nm_responsavel.required' => 'O campo Nome é Obrigatório',
        'nr_inicial.required'     => 'O campo N° Inicial é Obrigatório',
        'nr_final.required'       => 'O campo N° Final é Obrigatório'
      ];
  }
}
