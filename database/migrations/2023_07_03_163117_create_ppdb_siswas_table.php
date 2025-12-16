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
        Schema::create('ppdb_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ppdb')->nullable()->constrained('ppdbs');
            $table->string('nama', 100);
            $table->string('gender', 2)->nullable();
            $table->string('tempat_lahir', 30)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nohp', 20)->nullable();
            $table->string('nohp_ortu', 20)->nullable();
            $table->string('email_ortu', 50)->nullable();
            $table->string('nama_ayah', 50)->nullable();
            $table->foreignId('pekerjaan_ayah')->nullable()->constrained('pekerjaans');
            $table->integer('pendapatan_ayah')->nullable()->default(0);
            $table->string('nama_ibu', 50)->nullable();
            $table->foreignId('pekerjaan_ibu')->nullable()->constrained('pekerjaans');
            $table->integer('pendapatan_ibu')->nullable()->default(0);
            $table->string('nama_wali', 50)->nullable();
            $table->foreignId('pekerjaan_wali')->nullable()->constrained('pekerjaans');
            $table->integer('pendapatan_wali')->nullable();
            $table->text('alamat')->nullable();
            $table->foreignId('tk')->nullable()->constrained('tk_masters');
            $table->string('kategori_kelas', 15)->nullable();
            $table->text('file')->nullable();
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
        Schema::dropIfExists('ppdb_siswas');
    }
};
