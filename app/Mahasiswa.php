<?php

namespace App;

use App\Peminjaman;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    
	protected $table = 'tb_mahasiswa';

	public function peminjamans(){
		return $this->hasMany(Peminjaman::class);
	}

}
