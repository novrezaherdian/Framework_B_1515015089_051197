<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pengguna;

class penggunacontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari PenggunaController";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$pengguna = new pengguna();
    	$pengguna->username = 'novreza';
    	$pengguna->password = '1515015089';
    	$pengguna->save();
    	return "data dengan username {$pengguna->username} telah di simppan";
    }
}
