<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $table = 'hobi';

    protected $fillable = ['nama_hobi'];

    public function siswa() {
        return $this->belongsToMany('App\Siswa', 'hobi_siswa', 'id_hobi', 'id_siswa');
    }
}
