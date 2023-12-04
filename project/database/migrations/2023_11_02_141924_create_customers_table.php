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
        Schema::disableForeignKeyConstraints();
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('subname');
            $table->integer('cedula');
            $table->date('date_n')->nullable();
            $table->string('img_cedula')->nullable(); //ruta de img
            $table->string('img_partida_n')->nullable(); //ruta de img
            $table->string('sex');
            $table->string('civil_status');
            $table->string('profession_status');
            $table->string('address', 75)->nullable();
            $table->string('phone', 35)->nullable();
            $table->string('landline', 35)->nullable(); //telefono fijo
            $table->string('nationality');
            $table->date('date_admission')->nullable();
            $table->unsignedBigInteger('offices_id')->unsigned()->nullable();
            $table->foreign('offices_id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()
            ->references('id')->on('offices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
