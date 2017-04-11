<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen;
use App\Pengguna;

class DosenController extends Controller
{
 
 //public function dosen()
   // {
    //	$dosen = dosen::all();

//   	foreach ($dosen as $dsn) {
 //   		echo "Nama : ".$dsn->nama;
   // 		echo "<br>";
    //		echo "Username : ".$dsn->pengguna->Username;
    //		echo "<br>";
    //	}
    //}

//public function awal()
  //  {
    //	return "-- SELAMAT DATANG DI DOSEN CONTROLLER --";
    //}
//public function tambah()
//{
//	return $this->simpan();
//}
//public function simpan()
//{
//	$dosen = new Dosen();
//	$dosen->nama = 'Edy Budiman';
//	$dosen->nip = '12345';
//	$dosen->alamat = 'jl. gelatik';
//	$dosen->pengguna_id = '1';
//	$dosen->save();
//	return " ---> Data dosen bernama {$dosen->nama} telah disimpan <---";
//}

protected $informasi = 'Gagal melakukan aksi';

    public function awal()
    {
        $semuaDosen = Dosen::all();
        return view('dosen.awal',compact('semuaDosen'));
    }


    public function tambah()
    {
        return view('dosen.tambah');
    }


     public function simpan(Request $input)
    {

    $pengguna = new Pengguna($input->only('username','password'));

    if ($pengguna->save()) {
    $dosen = new Dosen;
    $dosen->nama = $input->nama;
    $dosen->nip = $input->nip;
    $dosen->alamat = $input->alamat;

    if ($pengguna->dosen()->save($dosen)) $this->informasi = "Berhasil simpan data Dosen";
    }
    return redirect('dosen')-> with(['informasi'=>$this->informasi]);
    }


    public function edit($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit')->with(array('dosen'=>$dosen));
    }

    public function lihat($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.lihat')->with(array('dosen'=>$dosen));
    }


   public function update($id, Request $input)
    {

    $dosen = Dosen::find($id);
    $dosen->nama = $input->nama;
    $dosen->nip = $input->nip;
    $dosen->alamat = $input->alamat;
    $dosen->save();

    if(!is_null($input->username)) {
        $pengguna = $dosen->pengguna->fill($input->only('username'));
    
    if(!empty($input->password)) $pengguna->password = $input->password;
    
    if($pengguna->save()) $this->informasi = 'Berhasil perbaharui data Dosen';
    }

    else {
    $this->informasi = 'Berhasil perbaharui data Dosen';
    }

    return redirect('dosen')->with(['informasi'=> $this->informasi]);
    }


     public function hapus($id)
    {
        $dosen = Dosen::find($id);
        if($dosen->pengguna()->delete()){
            if($dosen->delete()) $this->informasi = 'Berhasil hapus data Dosen';
        }
            return redirect('dosen')-> with(['informasi'=>$this->informasi]);
        
    }  
    
}
