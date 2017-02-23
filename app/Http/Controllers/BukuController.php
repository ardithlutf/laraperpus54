<?php

namespace App\Http\Controllers;

use App\Buku;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    
	public function index()
	{
		$bukus = Buku::paginate(5);
		return view('buku.index',['bukus' => $bukus]);
	}

	public function cariBuku(Request $request)
	{	
		$key = $request->key;
		$value  = $request->value;


		if($value == '' OR $key == ''){
			return redirect('buku');
		}else{
			$bukus = Buku::where($key,'like','%' . $value . '%')->paginate(10);
		}	
		return view('buku.index',['bukus'=>$bukus]);
	}

	public function create()
	{
		return view('buku.create');	
	}

	public function store(Request $request)
	{			
		$this->validate($request,[
			'isbn' => 'required',
			'judul_buku' => 'required|max:50',
			'nama_pengarang' => 'required|max:50',
			'tahun_terbit' => 'required|integer',
			'penerbit' => 'required|max:50',
			'jumlah_buku' => 'required|integer',
			'no_rak_buku' => 'required|max:50'
		]);

		// dd($request->all());

		# save
		$buku = new Buku;
		$buku->id_buku = Uuid::uuid4();
		$buku->isbn = $request->isbn;
		$buku->judul_buku = $request->judul_buku;
		$buku->nama_pengarang = $request->nama_pengarang;
		$buku->tahun_terbit = $request->tahun_terbit;
		$buku->penerbit = $request->penerbit;
		$buku->jumlah_buku = $request->jumlah_buku;
		$buku->no_rak_buku = $request->no_rak_buku;

		$buku->save();

		\Session::flash('message','Data Buku Berhasil Disimpan');

		return redirect('buku');
	}

	public function edit($idBuku)
	{
		$buku = Buku::where('id_buku', $idBuku)->firstOrFail();
		return view('buku.edit')
			->with('buku',$buku);	
	}

	public function update(Request $request, $idBuku)
	{
		$buku = Buku::where('id_buku', $idBuku)->firstOrFail();

		$this->validate($request,[
			'isbn' => 'required',
			'judul_buku' => 'required|max:50',
			'nama_pengarang' => 'required|max:50',
			'tahun_terbit' => 'required|integer',
			'penerbit' => 'required|max:50',
			'jumlah_buku' => 'required|integer',
			'no_rak_buku' => 'required|max:50'
		]);

		Buku::where('id_buku',$buku->id_buku)
			->update([
				'isbn' => $request->isbn,
				'judul_buku' => $request->judul_buku,
				'nama_pengarang' => $request->nama_pengarang,
				'tahun_terbit' => $request->tahun_terbit,
				'penerbit' => $request->penerbit,
				'jumlah_buku' => $request->jumlah_buku,
				'no_rak_buku' => $request->no_rak_buku
			]);

		\Session::flash('message','Data Berhasil Diperbarui');
		return redirect('buku');
	}


	public function destroy($idBuku)
	{	
		$buku = Buku::where('id_buku',$idBuku)->firstOrFail();
		Buku::where('id_buku', $buku->id_buku)->delete();
		\Session::flash('message','Data Buku Berhasil Dihapus');
		return redirect('buku');
	}

}
