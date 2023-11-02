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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cedula');
            $table->string('name');
            $table->string('subname');
            $table->date('date_n')->nullable();
            $table->string('address', 75)->nullable();
            $table->string('phone', 35)->nullable();
            $table->unsignedBigInteger('offices_id')->unsigned()->nullable();
            $table->foreign('offices_id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()
            ->references('id')->on('offices');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
