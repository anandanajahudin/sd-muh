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
        Schema::create('prestasi_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswas');
            $table->text('judul');
            $table->integer('juara');
            $table->string('tempat_kompetisi', 50);
            $table->date('tgl_kompetisi')->nullable();
            $table->string('kategori', 30);
            $table->text('deskripsi')->nullable();
            $table->text('foto')->nullable();
            $table->string('kelas', 5);
            $table->string('tahun_ajaran', 15);
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
        Schema::dropIfExists('prestasi_siswas');
    }
};
