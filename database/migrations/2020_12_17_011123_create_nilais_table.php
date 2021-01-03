<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->bigIncrements('id_nilai');
            $table->string('nim',15)->unique();
            $table->string('nama');
            $table->string('prodi');
            $table->smallInteger('angkatan');
            $table->smallInteger('nilai_pk2maba');
            $table->smallInteger('kkm_pk2maba');
            $table->string('status_kelulusan');
            $table->string('sertifikat')->nullable()->default(null);
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
        Schema::dropIfExists('nilais');
    }
}
