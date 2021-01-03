<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePK2MABASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk2mabas', function (Blueprint $table) {
            $table->bigIncrements('id_pk2maba');
            $table->string('judul_pk2maba');
            $table->text('konten_pk2maba');            
            $table->string('foto_pk2maba')->nullable()->default(null);
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
        Schema::dropIfExists('pk2mabas');
    }
}
