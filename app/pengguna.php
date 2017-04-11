<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{

    protected $table = 'pengguna';// digunakan untuk mendeklarasikan tabel pengguna

 protected $guarded=['id'];    

    //protected $fillable = ['username','password'];

    //DISINI MODEL PENGGUNA BERELASI DENGAN MODEL MAHASISWA DAN DOSEN

    public function mahasiswa(){ //UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI MAHASISWA PADA MODEL PENGGUNA 

    	return $this->hasOne(Mahasiswa::class) ;// memberikan nilai return dari fungsi hasOne yang merelasikan pengguna dengan mahasiswa dengan foreign key pengguna_id
    } 

    public function dosen(){ //UNTUK MENENTUKAN HUBUNGANNYA, DIBUAT FUNGSI DOSEN PADA MODEL PENGGUNA 
		
        return $this->hasOne(Dosen::class); // memberikan nilai return dari fungsi hasOne yang merelasikan pengguna dengan dosen dengan foreign key pengguna_id
	}
	
	//public function peran(){
	//return $this->belongsToMany(Peran::class);
	// }
}