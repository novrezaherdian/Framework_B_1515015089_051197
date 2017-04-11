<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    protected $table = 'peran';
    protected $guarded = ['id'];
	
	public function pengguna(); //membuat fungsi dengan nama pengguna
	{
		return this->belongsToMany(pengguna::class);
		//sintaks ini menghubungkan antara model pengguna dengan model peran, jadi kita bisa mengakses isi model pengguna melalui model peran. sintaks belongsToMany sendiri menandakan hubungan relasinya adalah many to many
	}
}
