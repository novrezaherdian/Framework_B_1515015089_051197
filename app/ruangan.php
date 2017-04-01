<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    public function JadwalMataKuliah(){
    	return $this->hasMany(JadwalMataKuliah::class);
    }
    protected $table = 'ruangan';
    // protected $fillable = ['title'];
}
