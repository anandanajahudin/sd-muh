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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis')->unique()->nullable();
            $table->bigInteger('nisn')->unique()->nullable();
            $table->text('foto')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->foreignId('id_ppdb_siswa')->nullable()->constrained('ppdb_siswas')->unique();
            $table->foreignId('id_user')->nullable()->constrained('users')->unique();
            $table->foreignId('id_kelas_siswa')->nullable()->constrained('kelas_siswas');
            $table->foreignId('id_mutasi')->nullable()->constrained('sd_mutasis');
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('siswas');
    }
};
