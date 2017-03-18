<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;

class dosen_matakuliahcontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari dosen_matakuliah controller";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$dosen_matakuliah = new dosen_matakuliah();
    	$dosen_matakuliah->title = 'Pemrograman Framework';
    	$dosen_matakuliah->dosen_id = '1';
    	$dosen_matakuliah->matakuliah_id = '1';
    	$dosen_matakuliah->save();
    	return "data dengan nama {$dosen_matakuliah->title} telah disimpan";
    }
}
