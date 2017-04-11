<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah'; // digunakan untuk mendeklarasikan tabel matakuliah

    //protected $fillable = ['title','keterangan'];

    //DISINI MODEL MATAKULIAH BERELASI DENGAN MODEL DOSEN_MATAKULIAH

      public function dosen_matakuliah(){ // UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DENGAN NAMA DOSEN_MATAKULIAH PADA MODEL MATAKULIAH

      return $this->hasMany(Dosen_matakuliah::class); // memberikan nilai return dari fungsi hasMany yang merelasikan matakuliah dengan banyak dosen_matakuliah dengan foreign key matakuliah_id

   }
}
