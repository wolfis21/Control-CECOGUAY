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
        'sex' => 'required',
        'civil_status' => 'required',
        'profession' => 'required',
        'phone' => 'required',
        'landline' => 'required',
        'nacionalidad' => 'required',
        'date_admission' => 'required',
        'img-cedula' => 'required',
        'img-nacimiento' => 'required',
        'offices_id' => 'required',
    ];

    /* protected $filiable = ['name','',]; */ //no need to

    public function office(){
        return $this->belongsTo(Office::class);
    }
    
}
