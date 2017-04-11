<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';  // digunakan untuk mendeklarasikan tabel dosen

      protected $guarded = ['id'];  //berfungsi untuk mengabaikan atribut id oleh Eloquent pada saat kita melakukan insert/update

    //protected $fillable = ['nama','nip','alamat','pengguna_id'];

     //DISINI MODEL DOSEN_MATAKULIAH BERELASI DENGAN MODEL PENGGUNA DAN MODEL DOSEN_MATAKULIAH

    public function pengguna(){ // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN NAMA PENGGUNA PADA MODEL DOSEN

   	return $this->belongsTo(Pengguna::class); // fungsi pengguna yang mempunyai nilai return dari fungsi belongsTo yang merelasikan tabel pengguna dengan model dosen
    }
   
   public function dosen_matakuliah(){  // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN NAMA DOSEN_MATAKULIAH PADA MODEL DOSEN

   return $this->hasMany(Dosen_matakuliah::class);  // model dosen_matakuliah yang mempunyai nilai return dari fungsi hasMany yang merelasikan dosen dengan banyak dosen_matakuliah dengan dosen_id sebagai foreign key nya
   }

   public function listDosenDanNip(){
        $out = [];
        foreach ($this->all() as $dsn) {
            $out[$dsn->id] = "{$dsn->nama} ({$dsn->nip})";
        }
    return $out;
    }
}
