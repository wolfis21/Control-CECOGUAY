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
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_admission');
            $table->string('cost_semanal')->nullable();
            $table->string('semana_cobro')->nullable();
            $table->string('atrasos')->nullable();
            $table->string('suspendido')->nullable();
            $table->string('observaciones')->nullable();
            $table->unsignedBigInteger('type_services_id')->unsigned()->nullable();
            $table->foreign('type_services_id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()
            ->references('id')->on('type_services');
            $table->unsignedBigInteger('customers_id')->unsigned()->nullable();
            $table->foreign('customers_id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()
            ->references('id')->on('customers');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
