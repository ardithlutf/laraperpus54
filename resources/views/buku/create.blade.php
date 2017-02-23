@extends('layouts.app')

@section('title','Tambah Data Buku')

@section('content')
		
	

	<div class="panel panel-default">
		<div class="panel-heading">Tambah data Buku</div>
		<div class="panel-body">
			@include('common.errors')
			{!! Form::open(['url' => 'simpanbuku']) !!}
		
				<div class="form-group">
					{!! Form::label('isbn','ISBN', ['class'=> 'control-label']) !!}
					{!! Form::text('isbn',null, ['class'=>'form-control', 'placeholder' => 'Nomor ISBN']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('judul_buku','Judul Buku', ['class'=> 'control-label']) !!}
					{!! Form::text('judul_buku',null, ['class'=>'form-control', 'placeholder' => 'Judul Buku']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('nama_pengarang','Pengarang', ['class'=> 'control-label']) !!}
					{!! Form::text('nama_pengarang',null, ['class'=>'form-control', 'placeholder' => 'Nama Pengarang']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('tahun_terbit','Tahun Terbit', ['class'=> 'control-label']) !!}
					{!! Form::number('tahun_terbit',null, ['class'=>'form-control', 'placeholder' => 'Nomor ISBN']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('penerbit','Penerbit', ['class'=> 'control-label']) !!}
					{!! Form::text('penerbit',null, ['class'=>'form-control', 'placeholder' => 'Penerbit']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('jumlah_buku','Jumlah Buku', ['class'=> 'control-label']) !!}
					{!! Form::text('jumlah_buku',null, ['class'=>'form-control', 'placeholder' => 'Jumlah Buku']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('no_rak_buku','No Rak Buku', ['class'=> 'control-label']) !!}
					{!! Form::text('no_rak_buku',null, ['class'=>'form-control', 'placeholder' => 'Nomor Rak']) !!}
				</div>

				{!! Form::submit('Simpan' , ['class' => 'btn btn-primary']) !!}
			
			{!! Form::close() !!}

		</div>
	</div>
	


		
@endsection