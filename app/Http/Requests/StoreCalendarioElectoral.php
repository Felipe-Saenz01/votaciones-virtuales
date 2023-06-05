<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCalendarioElectoral extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'concepto' => 'required',
            'fechaInicial' => 'required|date',
            'fechaFinal' => 'required|date|after_or_equal:fechaInicial',
            'idPeriodoAcademico' => 'required',
            'estado' => 'required'

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'concepto.required' => 'El concepto es requerido.',
            'fechaInicial.required' => 'La fecha inicial es requerida.',
            'fechaFinal.required' => 'La fecha final es requerida.',
            'idPeriodoAcademico.required' => 'El periodo academico es requerido.',
            'estado.required' => 'El estado academico es requerido.',
            'fechaInicial.date' => 'La fecha inicial debe estar en un formato dd/mm/yyyy',
            'fechaFinal.date' => 'La fecha final debe estar en un formato dd/mm/yyyy',
            'fechaFinal.after_or_equal' => 'La fecha final debe ser igual o mayor a la fecha inicial.',
        ];
    }
}
