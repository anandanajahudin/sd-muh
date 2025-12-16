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
        Schema::create('sifat_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswas');
            $table->foreignId('id_sifat')->constrained('sifat_masters');
            $table->string('kelas', 5)->nullable();
            $table->string('tahun_ajaran', 15)->nullable();
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
        Schema::dropIfExists('sifat_siswas');
    }
};
