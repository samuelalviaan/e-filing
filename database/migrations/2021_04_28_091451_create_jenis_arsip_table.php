<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('code_archives', function (Blueprint $table) {
            $table->id();
            $table->integer('archive_id');
            $table->string('nama_kode_arsip');
            $table->string('kode_arsip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode_arsip');
    }
}
