<?php

namespace App;

use App\Peminjaman;
use Illuminate\Database\Eloquent\Model;


class Buku extends Model
{
    
	protected $table = 'tb_buku';

	public function peminjamans(){
		return $this->hasMany(Peminjaman::class);
	}

}
