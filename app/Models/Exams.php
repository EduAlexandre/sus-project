<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;
    protected $fillable =[
            'examLung_date',
            'cvf_1',
            'cvf_2',
            'cvf_3',
            'vef_1',
            'vef_2',
            'vef_3',
            'vefcvf_1',
            'vefcvf_2',
            'vefcvf_3',
            'fef_1',
            'fef_2',
            'fef_3',
            'lung_result',
            'exam_chest_date',
            'exam_chest_number',
            'exam_chest_result',
            'exam_chest_neoplasms',
            'exam_chest_responsible',
            'appendant',
            'company_name',
            'company_cnae',
            'company_unity',
            'company_admission_date',
            'company_last_date',
            'company_fired_date',
            'company_sector',
            'company_office',
            'sinan',
            'cat',
            'employees_id',
    ];
}
