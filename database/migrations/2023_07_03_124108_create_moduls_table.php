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
        Schema::create('moduls', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->foreignId('id_jenis')->constrained('jenis_moduls');
            $table->text('deskripsi')->nullable();
            $table->text('gambar')->nullable();
            $table->text('file')->nullable();
            $table->float('ukuran_file')->nullable();
            $table->foreignId('id_kelas_master')->constrained('kelas_masters');
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
        Schema::dropIfExists('moduls');
    }
};