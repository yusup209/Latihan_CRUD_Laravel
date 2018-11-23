@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Data Siswa</h1>
		<a href="/siswa/add" class="btn btn-primary float-right">Tambah data</a><br>
	<br>


	<table class="table table-light table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($siswa as $row)
				<tr>
					<td>{{$row->id}}</td>
					<td>{{$row->nama}}</td>
					<td>{{$row->kelas_id}}</td>
					<td>{{$row->jurusan_id}}</td>
					<td>
						<a href="{{url('siswa/edit/'.$row->id)}}" class="btn btn-success">Edit</a>
						<a onclick="return confirm('Apakah anda mau menghapus siswa dengan nama {{$row->nama}}?')" href="{{url('siswa/delete/'.$row->id)}}" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection