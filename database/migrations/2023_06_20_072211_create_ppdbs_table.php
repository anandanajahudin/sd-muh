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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_batas')->nullable();
            $table->string('tahun_ajaran', 15);
            $table->integer('tahun')->default(0);
            $table->text('deskripsi')->nullable();
            $table->text('brosur')->nullable();
            $table->text('file')->nullable();
            $table->text('link')->nullable();
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
        Schema::dropIfExists('ppdbs');
    }
};