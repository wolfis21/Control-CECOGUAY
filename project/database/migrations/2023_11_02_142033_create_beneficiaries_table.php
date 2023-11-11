<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('subname');
            $table->integer('cedula');
            $table->date('date_n')->nullable();
            $table->string('img_cedula'); //ruta de img
            $table->string('img_partida_n'); //ruta de img
            $table->string('sex');
            $table->string('parentesco');
            $table->string('civil_status');
            $table->string('professional_status');
            $table->string('address', 75)->nullable();
            $table->string('phone', 35)->nullable();
            $table->string('landline', 35)->nullable(); //telefono fijo
            $table->string('nationality');
            $table->date('date_admission')->nullable();
            $table->unsignedBigInteger('contracts_id')->unsigned()->nullable();
            $table->foreign('contracts_id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()
            ->references('id')->on('contracts');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
