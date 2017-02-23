@extends('layouts.app')

@section('title','Tambah Data Peminjaman')

@section('content')
		
	

	<div class="panel panel-default">
		<div class="panel-heading">Tambah data Peminjaman</div>
		<div class="panel-body">

			@include('common.errors')
			
			{!! Form::model($peminjaman, ['url' => 'updatepeminjaman/' . $peminjaman->id_peminjaman , 'method' => 'PUT']) !!}
		
				<div class="form-group">
					{!! Form::label('id_peminjaman','ID Peminjaman', ['class'=> 'control-label']) !!}
					{!! Form::text('id_peminjaman',null, ['class'=>'form-control', 'placeholder' => 'Nomor Induk Mahasiswa', 'disabled' => 'TRUE' ]) !!}
					{!! Form::hidden('id_peminjaman', null) !!}
				</div>

				<div class="form-group">
					{!! Form::label('tanggal_peminjaman','Tanggal Peminjaman', ['class'=> 'control-label']) !!}
					{!! Form::date('tanggal_peminjaman',null, ['class'=>'form-control', 'placeholder' => 'Tanggal Peminjaman']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('tanggal_batas_pengembalian','Tanggal Batas Pengembalian', ['class'=> 'control-label']) !!}
					{!! Form::date('tanggal_batas_pengembalian',null, ['class'=>'form-control', 'placeholder' => 'Tanggal Batas Pengembalian']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('nim','Mahasiswa', ['class'=> 'control-label']) !!}
					{!! Form::select('nim',$mahasiswas,null, ['class'=>'form-control', 'placeholder' => 'Pilih Mahasiswa']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('id_buku','ID Buku', ['class'=> 'control-label']) !!}
					{!! Form::select('id_buku',$bukus, null ,['class'=>'form-control', 'placeholder' => 'ID Buku']) !!}
				</div>

				{!! Form::submit('Simpan' , ['class' => 'btn btn-primary']) !!}
			
			{!! Form::close() !!}

		</div>
	</div>
	


		
@endsection