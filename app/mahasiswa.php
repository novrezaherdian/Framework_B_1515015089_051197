<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; // digunakan untuk mendeklarasikan tabel mahasiswa
    protected $guarded=['id'];

    //protected $fillable = ['nama','nim','alamat','pengguna_id'];

    //DISINI MODEL MAHASISWA BERELASI DENGAN MODEL PENGGUNA DAN JADWAL_MATAKULIAH

    public function pengguna() { // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN NAMA PENGGUNA PADA MODEL MAHASISWA
   
    	return $this->belongsTo(Pengguna::class); // memberikan nilai return dari fungsi belongsTo yang merelasikan mahasiswa dengan pengguna
    }
    
    public function jadwal_matakuliah(){ // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN JADWAL_MATAKULIAH PADA MODEL MAHASISWA

        return $this->hasMany(JadwaL_matakuliah::class); // memberikaN nilai return dari fungsi hasMany yang merelasikan mahasiswa dengan banyak jadwal_matakuliah dengan foreign key mahasiswa_id
    }

    public function getUsernameAttribute(){
    	return $this->pengguna->username;
    }

    public function listMahasiswaDanNim(){
        $out = [];
        foreach ($this->all() as $mhs) {
            $out[$mhs->id] = "{$mhs->nama} ({$mhs->nim})";
        }
    return $out;
    }
}
