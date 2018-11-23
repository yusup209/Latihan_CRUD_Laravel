<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\hmm;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile($nama){

    }

    public function profileview(){
        $data['nama'] = 'Muhammad Yusup';
        $data['kelas'] = 'XI-RPL';
        $data['matpel'] = ['MTK','Bahasa Indonesia'];
        $data['tugas'] = [];

        return view('profile')->with($data);
    }

    // buat fungsi C R U D
    public function create_jurusan($nama){
        $jurusan = new Jurusan;
        $jurusan->nama = $nama;
        $jurusan->jumlah_siswa = rand(0,30);
        $jurusan->kajur = "S1NDU";
        $jurusan->save();

        return redirect(url('view_jurusan'));
    }

    public function update_jurusan($id,$nama){
        $jurusan = Jurusan::find($id);
        $jurusan->nama = $nama;
        $jurusan->jumlah_siswa = rand(0,30);
        $jurusan->kajur = "S1NDU";
        $jurusan->save();        

        return redirect(url('view_jurusan'));
    }

    public function delete_jurusan($id){
        Jurusan::find($id)->delete();

        return redirect(url('view_jurusan'));
    }

    public function view_jurusan(){
        $jurusans = Jurusan::get();
        foreach ($jurusans as $key){
            echo $key->id." ".$key->nama."<br>";
        }
    }

    // buat crud hmm
    public function lihat_hmm(){
        $hmms = hmm::get();

        for ($i=0;$i<sizeof($hmms);$i++){
            echo ($i+1)." - ".$hmms[$i]['lirik']." // ".$hmms[$i]['penyanyi']."<br>";
        }
    }

    public function create_hmm($lirik,$penyanyi){
        $hmms = new hmm;
        $hmms->lirik = $lirik;
        $hmms->penyanyi = $penyanyi;
        $hmms->save();

        return redirect(url('lihat_hmm'));
    }

    public function sunting_hmm($id,$lirik,$penyanyi){
        $hmms = hmm::find($id);
        $hmms->lirik = $lirik;
        $hmms->penyanyi = $penyanyi;

        $hmms->save();
        return redirect(url('lihat_hmm'));   
    }

    public function hapus_hmm($id){
        hmm::find($id)->delete();
        return redirect(url('lihat_hmm'));
    }
}
