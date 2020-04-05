<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_kelas',
        'foto'
    ];

    protected $dates = ['tanggal_lahir'];

    // Relasi Siswa - Hobi
    public function hobi() {
        return $this->belongsToMany('App\Hobi', 'hobi_siswa', 'id_siswa', 'id_hobi')->withTimeStamps();
    }


    // Relasi Siswa - Kelas
    public function kelas() {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }


    // Relasi Siswa - Telepon
    public function telepon() {
        return $this->hasOne('App\Telepon', 'id_siswa');
    }


    // Accessor
    public function getNamaSiswaAttribute($nama_siswa) {
        return ucwords($nama_siswa);
    }


    // Mutator
    public function setNamaSiswaAttribute($nama_siswa) {
        $this->attributes['nama_siswa'] = strtolower($nama_siswa);
    }


    // Accessor
    public function getHobiSiswaAttribute() {
        return $this->hobi->pluck('id')->toArray();
    }

    // Scope Kelas
    public function scopeKelas($query, $id_kelas) {
        return $query->where('id_kelas', $id_kelas);
    }

    // Scope Jenis Kelamin
    public function scopeJenisKelamin($query, $jenis_kelamin) {
        return $query->where('jenis_kelamin', $jenis_kelamin);
    }

}
