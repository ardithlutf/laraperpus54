<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Session;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
   
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function cariMahasiswa(Request $request)
    {   
        $key = $request->key;
        $value = $request->value;

        if($key == '' OR $value == '')
        {   
            return redirect('mahasiswa');
        }

        $mahasiswas = Mahasiswa::where($key,'like','%' . $value . '%')->paginate(10);
        return view('mahasiswa.index',compact('mahasiswas'));
    }
    
    public function create()
    {
        return view('mahasiswa.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nim'  => 'required',
            'nama' => 'required|max:50',
            'kelas'=> 'required|max:6',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        $mahasiswa = new Mahasiswa;

        $mahasiswa->nim  = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->alamat = $request->alamat;

        $mahasiswa->save();
        Session::flash('message','Data Mahasiswa berhasil disimpan');

        return redirect('mahasiswa');
  
    }
   
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim',$nim)->firstOrFail();
        return view('mahasiswa.edit',compact('mahasiswa'));
    }

 
    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim',$nim)->firstOrFail();
        $this->validate($request, [
            'nim'  => 'required',
            'nama' => 'required|max:50',
            'kelas'=> 'required|max:6',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);


        Mahasiswa::where('nim',$mahasiswa->nim)
            ->update([
                'nama' => $request->nama,
                'kelas'=>$request->kelas,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat'=> $request->alamat
            ]);

        Session::flash('message','Data Mahasiswa Diperbarui');
        return redirect('mahasiswa');
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim',$nim)->firstOrFail();
        Mahasiswa::where('nim',$mahasiswa->nim)->delete();
        
        Session::flash('message','Data Mahasiswa Berhasil Dihapus');
        return redirect('mahasiswa');
    }
}
