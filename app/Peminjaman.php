<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Buku;
use App\Mahasiswa;
class Peminjaman extends Model
{
    
	protected $table = 'tb_peminjaman';

	public function buku(){
		return $this->belongsTo(Buku::class);
	}

	public function mahasiswa(){
		return $this->belongsTo(Mahasiswa::class);
	}

}
