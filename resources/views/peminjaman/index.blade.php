@extends('layouts.app')
@section('title','Data Peminjaman')

@section('content')

	<div class="page-header text-center">
		<h1>Data Peminjaman</h1>
	</div>
	<div class="input-group">
		<a href="{{ url('tambahpeminjaman') }}" class="btn btn-success">Tambah Peminjaman</a>
	</div>
	<br>
	
	{!! Form::open(['url' => 'caripeminjaman' , 'class' =>'form form-inline']) !!}
	{!! Form::select('key',[
			'tanggal_peminjaman' => 'Tanggal Peminjaman',
			'tb_mahasiswa.nim' => 'NIM',
			'tb_buku.isbn' => "ISBN"
		], null, ['class' => 'form-control' ,'placeholder' => 'Pilih Kata Kunci']) !!}
	{!! Form::text('value',null,['class' => 'form-control', 'placeholder' => 'Cari Mahasiswa']) !!}
	{!! Form::submit('Cari', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!}
	<br><br>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center">NIM</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Kelas</th>
					<th class="text-center">Tanggal Peminjaman</th>
					<th class="text-center">Tanggal Pengembalian</th>
					<th class="text-center">Judul Buku</th>
					<th class="text-center">Pengarang</th>
					<th class="text-center">No Rak Buku</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@if(count($peminjamans))
					@foreach($peminjamans as $peminjaman)
						<tr>
							<td>{{ $peminjaman->nim }}</td>
							<td>{{ $peminjaman->nama }}</td>
							<td>{{ $peminjaman->kelas }}</td>
							<td>{{ $peminjaman->tanggal_peminjaman }}</td>
							<td>{{ $peminjaman->tanggal_batas_pengembalian }}</td>
							<td>{{ $peminjaman->judul_buku }}</td>
							<td>{{ $peminjaman->nama_pengarang }}</td>
							<td>{{ $peminjaman->no_rak_buku }}</td>
							<td>
								<a href="{{ url('editpeminjaman/' . $peminjaman->id_peminjaman) }}" class="btn btn-warning btn-xs btn-rounded"><i class="glyphicon glyphicon-pencil"></i></a><br>
								{!! Form::open(['url' => 'hapuspeminjaman/' . $peminjaman->id_peminjaman, 'method' => "DELETE"]) !!}
									<button type="submit" onclick="return confirm('Yakin Ingin Menghapus ?')" class="btn-rounded btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td class="text-center" colspan="6">Data Tidak Ada !</td>
					</tr>
				@endif
			</tbody>			
		</table>
	</div>

	{!! $peminjamans->render() !!}

@endsection