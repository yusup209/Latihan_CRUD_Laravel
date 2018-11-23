<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;


class siswaController extends Controller
{
    //
    public function index(){
    	$data['siswa'] = \App\siswa::all();
    	return view('Siswa.home')->with($data);
    }

    public function add(){
    	$data['kelas'] = \App\kelas::all();
    	$data['jurusan'] = \App\Jurusan::all();
    	return view('Siswa.add')->with($data);
    }

    public function save(Request $r){
    	$siswa = new siswa;

    	$siswa->nama = $r->input('txtNamaSiswa');
    	$siswa->jurusan_id = $r->input('cmbJurusan');
    	$siswa->kelas_id = $r->input('cmbKelas');
    	$siswa->save();

    	// return response()->json($siswa);
    	return redirect(url('siswa/all'));
    }

    public function edit($id){
    	$data['siswa'] = \App\siswa::find($id);
    	$data['jurusan'] = \App\Jurusan::all();
    	$data['kelas'] = \App\kelas::all();

    	return view('Siswa.edit')->with($data);
    }

    public function update(Request $r){
    	$siswa = \App\siswa::find($r->input('id'));
    	$siswa->jurusan_id = $r->input('jurusan_id');
    	$siswa->kelas_id = $r->input('kelas_id');
    	$siswa->nama = $r->input("nama");
    	$siswa->save();

    	return redirect(url("siswa/all"));
    }

    public function delete($id){
    	\App\siswa::find($id)->delete();

    	return redirect(url("siswa/all"));
    }

}
