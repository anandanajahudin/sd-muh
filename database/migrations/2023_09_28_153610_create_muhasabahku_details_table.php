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
        Schema::create('muhasabahku_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_muhasabah')->constrained('muhasabahkus');
            $table->foreignId('id_master_muhasabah')->constrained('master_muhasabahs');
            $table->integer('poin')->default(0);
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
        Schema::dropIfExists('muhasabahku_details');
    }
};
