<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_buku', function (Blueprint $table) {

            $table->uuid('id_buku');
            $table->string('isbn')->unique();
            $table->string('judul_buku',50);
            $table->string('nama_pengarang',50);
            $table->integer('tahun_terbit');
            $table->string('penerbit',50);
            $table->integer('jumlah_buku');
            $table->string('no_rak_buku',50);
            $table->timestamps();

            # Set PK On This Table
            $table->primary('id_buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_buku');
    }
}
