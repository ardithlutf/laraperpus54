<?php

namespace App\Http\Controllers;

use Session;
use App\Mahasiswa;
use App\Buku;
use App\Peminjaman;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
class PeminjamanController extends Controller
{
    
    public function index()
    {
        $peminjamans = \DB::table('tb_peminjaman')
            ->join('tb_buku','tb_peminjaman.id_buku', '=' , 'tb_buku.id_buku')
            ->join('tb_mahasiswa','tb_peminjaman.nim' , '=', 'tb_mahasiswa.nim')
            ->select(
                'tb_peminjaman.tanggal_batas_pengembalian',
                'tb_peminjaman.tanggal_peminjaman',
                'tb_peminjaman.id_peminjaman',
                'tb_mahasiswa.nim',
                'tb_mahasiswa.nama',
                'tb_mahasiswa.kelas',
                'tb_buku.isbn',
                'tb_buku.judul_buku',
                'tb_buku.nama_pengarang',
                'tb_buku.tahun_terbit',
                'tb_buku.penerbit',
                'tb_buku.no_rak_buku'
            )->paginate(10);

            return view('peminjaman.index',compact('peminjamans'));
    }

    # menggunakan model mahasiswa dan buku untuk
    # menampilkan pada form view helpers 
    public function create()
    {
        $mahasiswas = Mahasiswa::pluck('nama','nim');
        $bukus = Buku::pluck('judul_buku','id_buku');
        return view('peminjaman.create',[
            'mahasiswas' => $mahasiswas,
            'bukus' => $bukus
        ]);
    }

    
    public function store(Request $request)
    {
        $this->validate([
            'tanggal_batas_pengembalian' => 'required|date',
            'tanggal_peminjaman' =>'required|date',
            'mahasiswa'=>'required',
            'buku' => 'required'
        ]);

        $peminjaman = new Peminjaman;

        $peminjaman->id_peminjaman = Uuid::uuid4();
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->tanggal_batas_pengembalian = $request->tanggal_batas_pengembalian;
        $peminjaman->nim = $request->nim;
        $peminjaman->id_buku = $request->id_buku;

        $peminjaman->save();

        Session::flash('message','Data Transaksi Peminjaman Berhasil Disimpan'  );
        return redirect('peminjaman');
    }

    public function edit($idPeminjaman)
    {
        $peminjaman = Peminjaman::where('id_peminjaman',$idPeminjaman)->firstOrfail();
        $mahasiswas = Mahasiswa::pluck('nama','nim');
        $bukus = Buku::pluck('judul_buku','id_buku');
        return view('peminjaman.edit' , compact('peminjaman', 'mahasiswas', 'bukus'));       
    }

    public function update(Request $request, $idPeminjaman)
    {
        $peminjaman = Peminjaman::where('id_peminjaman',$idPeminjaman)->firstOrfail();
        $this->validate($request, [
            'tanggal_batas_pengembalian' => 'required|date',
            'tanggal_peminjaman' =>'required|date',
            'nim'=>'required',
            'id_buku' => 'required'
        ]);

        Peminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)
            ->update([
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
                'tanggal_batas_pengembalian' => $request->tanggal_batas_pengembalian,
                'nim' => $request->nim,
                'id_buku' => $request->id_buku
            ]);
        Session::flash('message','Data Transaksi Peminjaman Berhasil Diperbarui'  );
        return redirect('peminjaman');
    }

   
    public function destroy($idPeminjaman)
    {
        $peminjaman = Peminjaman::where('id_peminjaman',$idPeminjaman)->firstOrfail();
        Peminjaman::where('id_peminjaman', $peminjaman->id_peminjaman)->delete();

        Session::flash('message','Data Transaksi Peminjaman Berhasil dihapus'  );
        return redirect('peminjaman');
    }
}
