<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->foreignId('sender_id');
            $table->string('title');
            $table->string('no_surat');
            $table->string('logo_surat');
            $table->text('content_surat');
            $table->string('ttd_surat');
            $table->text('status');
            $table->timestamps();
        });

        Schema::create('surat_user', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('surat_id');
            $table->foreignId('user_id');
            $table->primary(['surat_id', 'user_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}
