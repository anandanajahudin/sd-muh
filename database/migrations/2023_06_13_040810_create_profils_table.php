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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->text('judul')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('judul_visi')->nullable();
            $table->text('deskripsi_visi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('operasional', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('telp', 20)->nullable();
            $table->text('daycare')->nullable();
            $table->text('daycare_img')->nullable();
            $table->text('link_fb')->nullable();
            $table->text('link_ig')->nullable();
            $table->text('link_twitter')->nullable();
            $table->text('link_yutub')->nullable();
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
        Schema::dropIfExists('profils');
    }
};
