<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->date('examLung_date');
            $table->string('cvf_1')->nullable()->default("NÃO INFORMADO");
            $table->string('cvf_2')->nullable()->default("NÃO INFORMADO");
            $table->string('cvf_3')->nullable()->default("NÃO INFORMADO");
            $table->string('vef_1')->nullable()->default("NÃO INFORMADO");
            $table->string('vef_2')->nullable()->default("NÃO INFORMADO");
            $table->string('vef_3')->nullable()->default("NÃO INFORMADO");
            $table->string('vefcvf_1')->nullable()->default("NÃO INFORMADO");
            $table->string('vefcvf_2')->nullable()->default("NÃO INFORMADO");
            $table->string('vefcvf_3')->nullable()->default("NÃO INFORMADO");
            $table->string('fef_1')->nullable()->default("NÃO INFORMADO");
            $table->string('fef_2')->nullable()->default("NÃO INFORMADO");
            $table->string('fef_3')->nullable()->default("NÃO INFORMADO");
            $table->text('lung_result')->nullable();
            $table->date('exam_chest_date')->nullable();
            $table->string('exam_chest_number')->nullable()->default("NÃO INFORMADO");
            $table->string('exam_chest_result')->nullable()->default("NÃO INFORMADO");
            $table->string('exam_chest_neoplasms')->nullable()->default("NÃO INFORMADO");
            $table->string('exam_chest_responsible')->nullable()->default("NÃO INFORMADO");
            $table->string('appendant')->nullable()->default("NÃO INFORMADO");
            $table->string('company_name')->nullable()->default("NÃO INFORMADO");
            $table->string('company_cnae')->nullable()->default("NÃO INFORMADO");
            $table->string('company_unity')->nullable()->default("NÃO INFORMADO");
            $table->date('company_admission_date')->nullable();
            $table->date('company_last_date')->nullable();
            $table->date('company_fired_date')->nullable();
            $table->string('company_sector')->nullable()->default("NÃO INFORMADO");
            $table->string('company_office')->nullable()->default("NÃO INFORMADO");
            $table->string('sinan')->nullable()->default("NÃO INFORMADO");
            $table->string('cat')->nullable()->default("NÃO INFORMADO");
            $table->foreignId('employees_id')->constrained('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table){
            $table->foreignId('employees_id')
                ->constrained()
                ->onDelete('cascade');
        });
        Schema::dropIfExists('exams');
    }
}
