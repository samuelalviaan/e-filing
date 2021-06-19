<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesCodeArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives_code_archives', function (Blueprint $table) {
            $table->foreignId('archive_id');
            $table->foreignId('code_archive_id');
            $table->primary(['archive_id', 'code_archive_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives_code_archives');
    }
}
