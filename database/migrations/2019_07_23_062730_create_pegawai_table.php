<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('nip',18)->primary();
            $table->string('nama_pegawai',40);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->date('tanggal_masuk');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->string('kode_status_kawin',3);
            // $table->string('jenis_kelamin',1);
            $table->text('foto');
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
        Schema::dropIfExists('pegawai');
    }
}
