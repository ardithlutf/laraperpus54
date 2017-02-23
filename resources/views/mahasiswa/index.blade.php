@extends('layouts.app')
@section('title','Data Mahasiswa')

@section('content')

	<div class="page-header text-center">
		<h1>Data Mahasiswa</h1>
	</div>
	<div class="input-group">
		<a href="{{ url('tambahmahasiswa') }}" class="btn btn-success">Tambah Mahasiswa</a>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6 col-sm-6">
			{!! Form::open(['url' => 'carimahasiswa' , 'class' =>'form form-inline']) !!}
			{!! Form::select('key',[
					'nim' => 'NIM',
					'nama' => 'Nama'
				], null, ['class' => 'form-control' ,'placeholder' => 'Pilih Kata Kunci']) !!}
			{!! Form::text('value',null,['class' => 'form-control', 'placeholder' => 'Cari Mahasiswa']) !!}
			{!! Form::submit('Cari', ['class' => 'btn btn-success']) !!}
			{!! Form::close() !!}
			<br><br>		
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center">NIM</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Kelas</th>
					<th class="text-center">Jenis Kelamin</th>
					<th class="text-center">Alamat</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@if(count($mahasiswas))
					@foreach($mahasiswas as $mahasiswa)
						<tr>
							<td>{{ $mahasiswa->nim }}</td>
							<td>{{ $mahasiswa->nama }}</td>
							<td>{{ $mahasiswa->kelas }}</td>
							<td>{{ $mahasiswa->jenis_kelamin }}</td>
							<td>{{ $mahasiswa->alamat }}</td>
							<td>
								<a href="{{ url('editmahasiswa/' . $mahasiswa->nim) }}" class="btn btn-warning btn-xs btn-rounded"><i class="glyphicon glyphicon-pencil"></i></a><br>
								{!! Form::open(['url' => 'hapusmahasiswa/' . $mahasiswa->nim, 'method' => "DELETE"]) !!}
									<button type="submit" class="btn-rounded btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
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

	{!! $mahasiswas->render() !!}

@endsection