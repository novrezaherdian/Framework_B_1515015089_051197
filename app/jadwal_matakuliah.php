<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_matakuliah extends Model
{
    protected $table = 'jadwal_matakuliah'; // digunakan untuk mendeklarasikan tabel jadwal_matakuliah

    protected $guarded = ['id']; // mengabaikan atribut id pada saat melakikan insert/update

    //protected $fillable = ['mahasiswa_id','ruangan_id','dosen_matakuliah_id'];

    //DISINI MODEL JADWAL_MATAKULIAH BERELASI DENGAN MODEL MAHASISWA, DOSEN_MATAKULIAH DAN RUANGAN

    public function mahasiswa(){ // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN NAMA MAHASISWA PADA MODEL JADWAL_MATAKULIAH

    return $this->belongsTo(mahasiswa::class); // memberikan nilai return dari fungsi belongsTo yang merelasikan banyak jadwal_matakuliah dengan mahasiswa

	  }

	  public function dosen_matakuliah(){  // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN NAMA DOSEN_MATAKULIAH PADA MODEL JADWAL_MATAKULIAH

    return $this->belongsTo(Dosen_matakuliah::class); // memberikan nilai return dari fungsi belongsTo yang merelasikan dosen_matakuliah dengan banyak jadwal_Matakuliah
    }

    public function ruangan(){ // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN NAMA RUANGAN PADA MODEL JADWAL_MATAKULIAH

    return $this->belongsTo(Ruangan::class); // memberikan nilai return dari fungsi belongsTo yang merelasikan ruangan dengan banyak jadwal_matakuliah
   }
}
