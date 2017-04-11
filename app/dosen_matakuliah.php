<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    //
    protected $table = 'dosen_matakuliah';
    //protected $fillable = ['dosen_id','matakuliah_id'];
    protected $guarded = ['id'];

    public function dosen() //membuat fungsi dengan nama dosen
    {
    	return $this->belongsTo(dosen::class);
        //sintaks ini fungsinya untuk menyatakan relasi dari model dosen_matakuliah dan model dosen. sehingga kita bisa mngakses model dosen melalui model dosen_matakuliah, begitu pula sebaliknya.jadi kita bisa mengambil isi tabelnya
    }

    public function matakuliah() //membuat fungsi dengan nama matakuliah
    {
    	return $this->belongsTo(matakuliah::class);
        //fungsinya untuk menyatakan relasi dari model dosen_matakuliah dan model atakuliah. sehingga kita bisa mngakses model matakuliah melalui model dosen_matakuliah, begitu pula sebaliknya.
    }

    public function jadwal_matakuliah() //membuat fungsi dengan nama jadwal_matakuliah
    {
    	return $this->hasMany(jadwal_matakuliah::class);
        //sintaks ini fungsinya untuk menyatakan relasi dari model dosen_matakuliah dan model jadwal_matakuliah. sehingga kita bisa mngakses model jadwal_matakuliah melalui model dosen, begitu pula sebaliknya.
        //sintaks hasmany menyatakan hubungan relasiny adalah one to many.
    }

    public function listdosenmatakuliah()
    {
        $out = [];
        foreach ($this->all() as $dsnmtk)
        {
            $out[$dsnmtk->id] = "{$dsnmtk->dosen->nama} (matakuliah {$dsnmtk->matakuliah->title})";
        }
        return $out;
    }
}