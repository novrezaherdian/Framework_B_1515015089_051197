<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::get('/', function () {
  //  return view ('welcome');
//});


//Route::get('/{id}',function(){
//	return \App\dosen_matakuliah::whereHas('matakuliah', function($q, $id)
//	{
//		$q->where('keterangan',$id);
//	})->with('matakuliah')->get();
//});

Route::get('hello-world', function () {
    return "Hello-world";
});

Route::get('mahasiswa_pengguna','MahasiswaController@mahasiswa');

Route::get('ujiHas','RelationRebornController@ujiHas');

Route::get('ujiDoesntHave','RelationRebornController@ujiDoesntHave');

Route::get('wherehas',function()
 	{
    return \App\Dosen_matakuliah::whereHas('dosen',function($query)
    {
    	$query->where('nama','like','%a%');
    })
->orWhereHas('matakuliah',function ($query)
{
	$query->where('title','like','%a%');
})
->with('dosen','matakuliah')
->groupBy('dosen_id')
->get();
});

Route::auth();

Route::get('/login','SesiController@form');
Route::post('/login','SesiController@validasi');
Route::get('/logout','SesiController@logout');
Route::get('/','SesiController@index');

Route::group(['middleware'=>'AutentifikasiUser'],function()
{

Route::get('pengguna','PenggunaController@awal');
Route::get('pengguna/tambah','PenggunaController@tambah');
Route::get('pengguna/{pengguna}','PenggunaController@lihat');
Route::post('pengguna/simpan','PenggunaController@simpan');
Route::get('pengguna/edit/{pengguna}','PenggunaController@edit');
Route::post('pengguna/edit/{pengguna}','PenggunaController@update');
Route::get('pengguna/hapus/{pengguna}','PenggunaController@hapus');

Route::get('dosen','DosenController@awal');
Route::get('dosen/tambah', 'DosenController@tambah');
Route::get('dosen/{pengguna}', 'DosenController@lihat');
Route::post('dosen/simpan', 'DosenController@simpan');
Route::get('dosen/edit/{pengguna}', 'DosenController@edit');
Route::post('dosen/edit/{pengguna}', 'DosenController@update');
Route::get('dosen/hapus/{pengguna}', 'DosenController@hapus');

Route::get('mahasiswa','MahasiswaController@awal');
Route::get('mahasiswa/tambah','MahasiswaController@tambah');
Route::get('mahasiswa/{mahasiswa}','MahasiswaController@lihat');
Route::post('mahasiswa/simpan', 'MahasiswaController@simpan');
Route::get('mahasiswa/edit/{mahasiswa}', 'MahasiswaController@edit');
Route::post('mahasiswa/edit/{mahasiswa}', 'MahasiswaController@update');
Route::get('mahasiswa/hapus/{mahasiswa}', 'MahasiswaController@hapus');

Route::get('matakuliah','MatakuliahController@awal');
Route::get('matakuliah/tambah', 'MatakuliahController@tambah');
Route::get('matakuliah/{matakuliah}', 'MatakuliahController@lihat');
Route::post('matakuliah/simpan', 'MatakuliahController@simpan');
Route::get('matakuliah/edit/{matakuliah}', 'MatakuliahController@edit');
Route::post('matakuliah/edit/{matakuliah}', 'MatakuliahController@update');
Route::get('matakuliah/hapus/{matakuliah}', 'MatakuliahController@hapus');

Route::get('dosen_matakuliah','Dosen_matakuliahController@awal');
Route::get('dosen_matakuliah/tambah', 'Dosen_matakuliahController@tambah');
Route::get('dosen_matakuliah/{dosen_matakuliah}', 'Dosen_matakuliahController@lihat');
Route::post('dosen_matakuliah/simpan', 'Dosen_matakuliahController@simpan');
Route::get('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_matakuliahController@edit');
Route::post('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_matakuliahController@update');
Route::get('dosen_matakuliah/hapus/{dosen_matakuliah}', 'Dosen_matakuliahController@hapus');

Route::get('ruangan','RuanganController@awal');
Route::get('ruangan/tambah', 'RuanganController@tambah');
Route::post('ruangan/simpan', 'RuanganController@simpan');
Route::get('ruangan/{ruangan}','RuanganController@lihat');
Route::get('ruangan/edit/{ruangan}', 'RuanganController@edit');
Route::post('ruangan/edit/{ruangan}', 'RuanganController@update');
Route::get('ruangan/hapus/{ruangan}', 'RuanganController@hapus');

Route::get('jadwal_matakuliah','Jadwal_matakuliahController@awal');
Route::get('jadwal_matakuliah/tambah', 'Jadwal_matakuliahController@tambah');
Route::post('jadwal_matakuliah/simpan', 'Jadwal_matakuliahController@simpan');
Route::get('jadwal_matakuliah/{jadwal_matakuliah}', 'Jadwal_matakuliahController@lihat');
Route::get('jadwal_matakuliah/edit/{jadwal_matakuliah}', 'Jadwal_matakuliahController@edit');
Route::post('jadwal_matakuliah/edit/{jadwal_matakuliah}', 'Jadwal_matakuliahController@update');
Route::get('jadwal_matakuliah/hapus/{jadwal_matakuliah}', 'Jadwal_matakuliahController@hapus');

});


// Route::get('/', function (Illuminate\Http\Request $request)
// {
//     echo "ini adalah request dari method get ". $request->nama;
// });

// use Illuminate\Http\Request;
// Route::get('/', function ()
// {
//     echo Form::open(['url'=>'/']).
//     Form::label('nama ').
//     Form::text('nama',null).
//     Form::submit('kirim').
//     Form::close();
// });

// Route::post('/', function (Request $request)
// {
// 	echo "Hasil dari form input tadi nama : ".$request->nama;
//});

