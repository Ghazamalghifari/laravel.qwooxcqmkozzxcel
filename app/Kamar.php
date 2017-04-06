<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    //
    protected $fillable = ['id','kelas','kode_bed','nama_kamar','tarif','tarif_2','tarif_3','tarif_4','tarif_5','tarif_6','tarif_7','fasilitas','status','jumlah_bed','sisa_bed'];


	public function kelas()
    {
    return $this->belongsTo('App\Kelas_kamar','kelas');
    }
    
}
