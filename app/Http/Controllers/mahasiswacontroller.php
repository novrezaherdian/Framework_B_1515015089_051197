<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\mahasiswa;


class mahasiswacontroller extends Controller
{
    public function mahasiswa()
    {
        $mahasiswa = mahasiswa::find(1);
        echo "Nama : ".$mahasiswa->nama;
        echo "<br>";
        echo "Username : ".$mahasiswa->pengguna->username;
    }
    public function awal()
    {
    	return "Hello dari mahasiswa controller";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$mahasiswa = new mahasiswa();
    	$mahasiswa->nama = 'Laksana';
    	$mahasiswa->nim = '151503';
    	$mahasiswa->alamat = 'JL. Muhammad Said';
    	$mahasiswa->pengguna_id = '1';
    	$mahasiswa->save();
    	return "data dengan nama {$mahasiswa->nama} telah disimpan";
    }
}
