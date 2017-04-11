<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jadwal_matakuliah;
use App\Mahasiswa;
use App\Dosen_matakuliah;
use App\Ruangan;



class Jadwal_matakuliahController extends Controller
{

	protected $informasi = 'Gagal melakukan aksi';

    public function awal()
    {
    	$semuaJadwal_matakuliah = Jadwal_matakuliah::all();
        return view('jadwal_matakuliah.awal',compact('semuaJadwal_matakuliah'));
    }

	public function tambah()
	{
		$mahasiswa = new Mahasiswa;
		$ruangan = new Ruangan;
		$dosen_matakuliah = new Dosen_matakuliah;
		return view('jadwal_matakuliah.tambah',compact('mahasiswa','ruangan','dosen_matakuliah'));
	}


	public function simpan(Request $input)
	{
		
        $jadwal_matakuliah = new Jadwal_matakuliah($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));

        if ($jadwal_matakuliah->save()) $this->informasi = "Jadwal Mahasiswa berhasil disimpan";
    
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);
	}


	public function lihat($id)
    {
        $jadwal_matakuliah = Jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.lihat',compact('jadwal_matakuliah'));
    }	


    public function edit($id)
    {
        $jadwal_matakuliah = Jadwal_matakuliah::find($id);
        $mahasiswa = new Mahasiswa;
        $ruangan = new Ruangan;
        $dosen_matakuliah = new Dosen_matakuliah;
        return view('jadwal_matakuliah.edit',compact('mahasiswa','ruangan','dosen_matakuliah','jadwal_matakuliah'));
    }


    public function update($id, Request $input)
    {

    	$jadwal_matakuliah = Jadwal_matakuliah::find($id);
    	$jadwal_matakuliah->fill($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));

   		 if($jadwal_matakuliah->save()) $this->informasi = 'Jadwal Mahasiswa berhasil diperbaharui';
    	
    	return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);	
	}


	public function hapus($id, Request $input)
    {
        $jadwal_matakuliah = Jadwal_matakuliah::find($id);

            if($jadwal_matakuliah->delete()) $this->informasi = 'Jadwal Mahasiswa berhasil dihapus';
            return redirect('jadwal_matakuliah')-> with(['informasi'=>$this->informasi]);
        
    }  
}
