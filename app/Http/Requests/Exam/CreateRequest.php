<?php

namespace App\Http\Requests\Exam;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'examLung_date'          => 'date',
            'cvf_1'                  => 'max:120|string',
            'cvf_2'                  => 'max:120|string',
            'cvf_3'                  => 'max:120|string',
            'vef_1'                  => 'max:120|string',
            'vef_2'                  => 'max:120|string',
            'vef_3'                  => 'max:120|string',
            'vefcvf_1'               => 'max:120|string',
            'vefcvf_2'               => 'max:120|string',
            'vefcvf_3'               => 'max:120|string',
            'fef_1'                  => 'max:120|string',
            'fef_2'                  => 'max:120|string',
            'fef_3'                  => 'max:120|string',
            'lung_result'            => 'max:500|string',
            'exam_chest_date'        => 'date',
            'exam_chest_number'      => 'max:120|string',
            'exam_chest_result'      => 'max:120|string',
            'exam_chest_neoplasms'   => 'max:120|string',
            'exam_chest_responsible' => 'max:120|string',
            'appendant'              => 'mimes:pdf',
            'company_name'           => 'max:120|string',
            'company_cnae'           => 'max:120|string',
            'company_unity'          => 'max:120|string',
            'company_admission_date' => 'date',
            'company_last_date'      => 'date',
            'company_fired_date'     => 'date',
            'company_sector'         => 'max:120|string',
            'company_office'         => 'max:120|string',
            'sinan'                  => 'max:120|string',
            'cat'                    => 'max:120|string',
            'employees_id'           => 'numeric|required'
        ];
    }
}
