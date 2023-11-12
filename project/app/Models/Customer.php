<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'required',
        'subname' => 'required',
        'cedula' => 'required',
        'date_n' => 'required',
        'img_cedula' => 'required',
        'img_partida_n' => 'required',
        'sex' => 'required',
        'civil_status' => 'required',
        'profession_status' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'landline' => 'required',
        'nationality' => 'required',
        'date_admission' => 'required',
        'offices_id' => 'required',
    ];

    protected $fillable = [
        'name',
        'subname',
        'cedula',
        'date_n',
        'img_cedula',
        'img_partida_n',
        'sex',
        'civil_status',
        'profession_status',
        'address',
        'phone',
        'landline',
        'nationality',
        'date_admission',
        'offices_id',

        // otros campos aquí
     ];
     public function office(){
        return $this->belongsTo(Office::class,'offices_id', 'id');
    }
    
}
