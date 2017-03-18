<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\matakuliah;

class matakuliahcontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari matakuliah controller";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$matakuliah = new matakuliah();
    	$matakuliah->title = 'Pemrograman Framework';
    	$matakuliah->keterangan = 'Jam 7:00 - 9:00';
    	$matakuliah->save();
    	return "data dengan nama {$matakuliah->title} telah disimpan";
    }
}
