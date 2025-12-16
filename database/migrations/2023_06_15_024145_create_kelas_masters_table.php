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
        Schema::create('kelas_masters', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->string('jenis', 20);
            $table->integer('kelas');
            $table->integer('biaya_daful')->nullable();
            $table->integer('spp')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('kelas_masters');
    }
};