<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    //
    protected $fillable = ['id','nama','nama_cetak','dari_satuan','qty'];
}
