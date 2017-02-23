@extends('layouts.app')

@section('title','Data Buku')

@section('content')
		
	<div class="page-header text-center">
		<h1>Daftar Buku</h1>
	</div>	

	<div class="input-group">
		<a href="{{ url('tambahbuku') }}" class="btn btn-primary">Tambah Data</a>
	</div>

	<br>

	{!! Form::open(['url' => 'caribuku' , 'class' =>'form form-inline']) !!}
	{!! Form::select('key',[
			'id_buku' => 'ID Buku',
			'judul_buku' => 'Judul Buku',
			'pengarang' => 'Pengarang',
			'tahun_terbit' => 'Tahun Terbit',
			'penerbit' => 'Penerbit',
			'jumlah_buku' => 'Jumlah Buku',
			'no_rak_buku' => 'Nomor Rak Buku' 
		], null, ['class' => 'form-control' ,'placeholder' => 'Pilih Kata Kunci']) !!}
	{!! Form::text('value',null,['class' => 'form-control', 'placeholder' => 'Cari Buku']) !!}
	{!! Form::submit('Cari', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!}
	<br><br>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					{{-- <th class="text-center">ID Buku</th> --}}
					<th class="text-center">ISBN</th>
					<th class="text-center">Judul Buku</th>
					<th class="text-center">Pengarang</th>
					<th class="text-center">Terbit</th>
					<th class="text-center">Penerbit</th>
					<th class="text-center">Jumlah</th>
					<th class="text-center">Nomor Rak</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@if(count($bukus))
					@foreach($bukus as $buku)
						<tr>
							{{-- <td>{{ $buku->id_buku }}</td> --}}
							<td>{{ $buku->isbn }}</td>
							<td>{{ $buku->judul_buku}}</td>
							<td>{{ $buku->nama_pengarang }}</td>
							<td>{{ $buku->tahun_terbit }}</td>
							<td>{{ $buku->penerbit }}</td>
							<td>{{ $buku->jumlah_buku }}</td>
							<td>{{ $buku->no_rak_buku }}</td>
							<td>
								<a class="btn btn-xs btn-warning btn-rounded" href="{{ url("editbuku/" . $buku->id_buku) }}"><i class="glyphicon glyphicon-pencil"></i></a> <br>
								{!! Form::open(['url' => "hapusbuku/$buku->id_buku" , 'method' => 'DELETE']) !!}
									<button type="submit" class="btn-rounded btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td class="text-center text-strong" colspan="8">Data Tidak Ada !</td>	
					</tr>
				@endif
			</tbody>
		</table>
	</div>
	{!! $bukus->render() !!}
@endsection