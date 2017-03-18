<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ruangan;

class ruangancontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari ruangan controller";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$ruangan = new ruangan();
    	$ruangan->title = 'Ruang 411A';
    	$ruangan->save();
    	return "data dengan nama {$ruangan->title} telah disimpan";
    }
}
