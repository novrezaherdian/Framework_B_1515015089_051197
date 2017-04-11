<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'Ruangan';
    public function jadwal_matakuliah()//membuat function jadwal_matakuliah
    {
		return $this->hasMany(jadwal_matakuliah::class);//membuat relasi one to many ke table jdawal_matakuliah dari table ruangan
	}	
    //protected $fillable = ['title'];
}
