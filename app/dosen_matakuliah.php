<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    public function dosen(){
    	return $this->belongsTo(Dosen::class);
    }
    public function matakuliah(){
    	return $this->belongsTo(MataKuliah::class);
    }
    public function Jadwalmatakuliah(){
    	return $this->hasMany(JadwalMataKuliah::class);
    }
    protected $table = 'dosen_matakuliah';
    protected $fillable = ['title','dosen_id','matakuliah_id'];
}
