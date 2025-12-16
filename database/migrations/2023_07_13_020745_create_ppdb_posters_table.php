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
        Schema::create('ppdb_posters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ppdb')->constrained('ppdbs');
            $table->string('judul', 50)->nullable();
            $table->text('poster')->nullable();
            $table->string('jenis', 10)->nullable();
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
        Schema::dropIfExists('ppdb_posters');
    }
};
