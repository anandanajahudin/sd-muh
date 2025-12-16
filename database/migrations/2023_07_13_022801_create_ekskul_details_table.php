<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekskul_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ekskul')->constrained('ekskuls');
            $table->string('judul', 50)->nullable();
            $table->string('jenis', 30)->nullable();
            $table->text('foto')->nullable();
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('ekskul_details');
    }
};
