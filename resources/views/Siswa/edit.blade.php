@extends('layouts.app')
@section('content')
	<div class="container">
		<h1>Edit Data Siswa</h1><br>

		<div class="row">
			<div class="col-4">
				<form action="{{url('siswa/update')}}" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text" class="form-control" name="nama" placeholder="Username..." value="{{$siswa->nama}}">
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<select class="form-control" name="kelas_id">
							<option value="">-- Pilih Kelas --</option>
							@foreach ($kelas as $kel)
								<option value="{{$kel->id}}">{{$kel->nama}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<select class="form-control" name="jurusan_id">
							<option value="">-- Pilih Jurusan --</option>
							@foreach ($jurusan as $jur)
								<option value="{{$jur->id}}">{{$jur->nama}}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="id" value="{{$siswa->id}}">
					<div class="form-group">
						<button class="btn btn-success">Simpan</button>
						<a href="{{url('siswa/all')}}" class="btn btn-danger">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection