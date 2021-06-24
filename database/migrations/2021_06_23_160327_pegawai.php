<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Schema::create('pegawai', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nik');
        //     $table->string('nama');
            
        //     $table->date('tgl_pegawai');
        //     $table->timestamps();
        // });

        Schema::table('pegawai', function (Blueprint $table) {
            $table->foreignId('agama_id')->constrained('agama');
            $table->foreignId('jabatan_id')->constrained('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
