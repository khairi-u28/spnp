<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemutihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemutihans', function (Blueprint $table) {
            $table->bigIncrements('id_infoPemutihan');
            $table->string('judul_pemutihan');
            $table->text('konten_pemutihan');            
            $table->string('foto_pemutihan')->nullable()->default(null);
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
        Schema::dropIfExists('pemutihans');
    }
}
