<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Convenio extends Model
{
    protected $fillable = [
        'convenio',
        'anotaciones'
    ];

    use HasFactory;

    public function convenios(){
        return $this->belongsTo('App\Models\Convenio');
    }

}
