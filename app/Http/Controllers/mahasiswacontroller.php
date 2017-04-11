<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;
use App\Pengguna;

class MahasiswaController extends Controller
{

  // public function mahasiswa()
    //{
    	//$mahasiswa = mahasiswa::all();

    	//foreach ($mahasiswa as $mhs) {
    		//echo "Nama : ".$mhs->nama;
    		//echo "<br>";
    		//echo "Username : ".$mhs->pengguna->username;
    		//echo "<br>";
    	//}
    //}

   //public function awal()
    //{
    	//return "-- SELAMAT DATANG DI MAHASISWA CONTROLLER --";
    //}
//public function tambah()
//{
	//return $this->simpan();
//}
//public function simpan()
//{
	//$mahasiswa = new Mahasiswa();
	//$mahasiswa->nama = 'Olivia Angelica';
	//$mahasiswa->nim = '1515015091';
	//$mahasiswa->alamat = 'jl. nusantara 4';
	//$mahasiswa->pengguna_id = '2';
	//$mahasiswa->save();
	//return " ---> Data mahasiswa dengan nama {$mahasiswa->nama} telah disimpan <---";
//}

   protected $informasi = 'Gagal melakukan aksi';

   public function awal()
    {
        $semuaMahasiswa = Mahasiswa::all();
        return view('mahasiswa.awal',compact('semuaMahasiswa'));
    }


    public function tambah()
    {
        return view('mahasiswa.tambah');
    }

    
    public function simpan(Request $input)
    {

    $pengguna = new Pengguna($input->only('username','password'));

    if ($pengguna->save()) {
    $mahasiswa = new Mahasiswa;
    $mahasiswa->nama = $input->nama;
    $mahasiswa->nim = $input->nim;
    $mahasiswa->alamat = $input->alamat;

    if ($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi = "Berhasil simpan data";
    }
    return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function lihat($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }


   public function update($id, Request $input)
    {

    $mahasiswa = Mahasiswa::find($id);
    $mahasiswa->nama = $input->nama;
    $mahasiswa->nim = $input->nim;
    $mahasiswa->alamat = $input->alamat;
    $mahasiswa->save();

       // $pengguna = new Pengguna($input->only('username'));
    if(!is_null($input->username)) {
        $pengguna = $mahasiswa->pengguna->fill($input->only('username'));
        if(!empty($input->password)) $pengguna->password = $input->password;
    if($pengguna->save()) $this->informasi = 'Berhasil perbaharui data';
    }else{
    $this->informasi = 'Berhasil perbaharui data';
}

    return redirect('mahasiswa')->with(['informasi'=> $this->informasi]);
    }


     public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa->pengguna()->delete()){
            if($mahasiswa->delete()) $this->informasi = 'Berhasil hapus data';
        }
            return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
        
    }  
}
