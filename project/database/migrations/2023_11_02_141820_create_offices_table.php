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
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address', 70)->nullable();
            $table->string('num_contact', 20)->nullable();
            $table->unsignedBigInteger('companies_id')->unsigned()->nullable();
            $table->foreign('companies_id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()
            ->references('id')->on('companies');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
