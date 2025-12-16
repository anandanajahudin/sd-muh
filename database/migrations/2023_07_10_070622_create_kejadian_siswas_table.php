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
        Schema::create('kejadian_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswas');
            $table->string('judul', 50);
            $table->text('deskripsi');
            $table->date('tgl_kejadian')->nullable();
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
        Schema::dropIfExists('kejadian_siswas');
    }
};