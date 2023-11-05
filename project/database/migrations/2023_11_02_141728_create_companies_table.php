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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rif_companies', 20)->nullable();
            $table->string('name', 30)->nullable();
            $table->text('description');
            $table->string('num_contact', 75)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('offices');
    }
};
