Hello view

Nama : {{$nama}}
Kelas : {{$kelas}}

<br>
@foreach ($matpel as $row)
	Matpel : {{$row}}<br>
@endforeach

<br>
@forelse ($tugas as $key)
	Tugas : {{$key}}
@empty
	Kosong?
@endforelse

<br>

@for ($i=0;$i<sizeof($matpel);$i++)
	{{$matpel[$i]}}<br>
@endfor

<br>
{{$matpel[0]}}