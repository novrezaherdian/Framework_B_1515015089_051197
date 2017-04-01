<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_matakuliah extends Model
{
   public function mahasiswa(){
    	return $this->belongsTo(Mahasiswa::class);
   }
   public function ruangan(){
    	return $this->belongsTo(Ruangan::class);
   }
   public function Dosen_MataKuliah(){
    	return $this->belongsTo(DosenMataKuliah::class);
   }
    protected $table = 'jadwal_matakuliah';
    protected $fillable = ['mahasiswa_id','ruangan_id','dosen_matakuliah'];
}
