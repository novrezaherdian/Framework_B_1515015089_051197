<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
	public function dosen_matakuliah(){
    	return $this->hasMany(DosenMataKuliah::class);
    }

    protected $table = 'matakuliah';
    // protected $fillable = ['title','keterangan'];
}
