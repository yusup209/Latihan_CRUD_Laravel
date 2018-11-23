@extends('layouts.app')

@section('content')
	<div class="container col-4 left">
		<form method="POST" action="{{url('siswa/save')}}">
			{{csrf_field()}}
			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="txtNamaSiswa" class="form-control">
			</div>
			<div class="form-group">
				<label>Jurusan</label>
				<select class="form-control" name="cmbJurusan">
					<option value="">-- Pilih Jurusan --</option>
					@foreach ($jurusan as $row)
						<option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<select class="form-control" name="cmbKelas">
					<option value="">-- Pilih Kelas --</option>
					@foreach ($kelas as $row)
						<option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
@endsection