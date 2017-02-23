@extends('layouts.app')

@section('title','Tambah Data Mahasiswa')

@section('content')
		
	

	<div class="panel panel-default">
		<div class="panel-heading">Tambah data Mahasiswa</div>
		<div class="panel-body">

			@include('common.errors')
			
			{!! Form::open(['url' => 'simpanmahasiswa']) !!}
		
				<div class="form-group">
					{!! Form::label('nim','NIM', ['class'=> 'control-label']) !!}
					{!! Form::text('nim',null, ['class'=>'form-control', 'placeholder' => 'Nomor Induk Mahasiswa']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('nama','Nama Mahasiswa', ['class'=> 'control-label']) !!}
					{!! Form::text('nama',null, ['class'=>'form-control', 'placeholder' => 'Nama Mahasiswa']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('kelas','Kelas', ['class'=> 'control-label']) !!}
					{!! Form::text('kelas',null, ['class'=>'form-control', 'placeholder' => 'Kelas']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('jenis_kelamin','Jenis Kelamin', ['class'=> 'control-label']) !!}
					{!! Form::select('jenis_kelamin',array('pria' => 'Pria' , 'wanita' => 'Wanita'),null, ['class'=>'form-control', 'placeholder' => 'Pilih Jenis Kelamin']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('alamat','Alamat', ['class'=> 'control-label']) !!}
					{!! Form::text('alamat',null, ['class'=>'form-control', 'placeholder' => 'Alamat']) !!}
				</div>

				{!! Form::submit('Simpan' , ['class' => 'btn btn-primary']) !!}
			
			{!! Form::close() !!}

		</div>
	</div>
	


		
@endsection