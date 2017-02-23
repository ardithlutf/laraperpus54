<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peminjaman', function (Blueprint $table) {

            $table->uuid('id_peminjaman');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_batas_pengembalian');
            $table->timestamps();

            # Set PK on this table
            $table->primary('id_peminjaman');

            # relasi foreign key ke tabel lain
            $table->string('nim',15);
            $table->char('id_buku',36);


            # Menggunakan Cascade karena jika data Mahasiswa dihapus
            # data peminjaman juga akan dihapus

            $table->foreign('nim')
                ->references('nim')
                ->on('tb_mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            # non cascade karena jika buku dihapus
            # data peminjaman tidak akan terhapus
                
            $table->foreign('id_buku')
                ->references('id_buku')
                ->on('tb_buku');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_peminjaman');
    }
}
