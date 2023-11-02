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
        Schema::create('contracts_beneficiaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contracts_id');
            $table->foreign('contracts_id')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate()
                    ->references('id')->on('contracts');
            $table->unsignedBigInteger('beneficiaries_id');
            $table->foreign('beneficiaries_id')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate()
                    ->references('id')->on('beneficiariess'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts_beneficiaries');
    }
};
