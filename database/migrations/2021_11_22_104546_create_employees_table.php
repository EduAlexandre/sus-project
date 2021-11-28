<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('mother', 150);
            $table->string('cpf', 14)->unique();
            $table->string('rg', 30)->unique();
            $table->string('sus_card',50)->unique();
            $table->string('isAlive', 3);
            $table->text('deathCause')->nullable(true);
            $table->string('address', 80);
            $table->string('district', 80);
            $table->string('city', 40);
            $table->string('state', 2);
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
        Schema::dropIfExists('employees');
    }
}
