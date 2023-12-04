<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'required',
        'subname' => 'required',
        'cedula' => 'required',
        'date_n' => 'required',
        'sex' => 'required',
        'civil_status' => 'required',
        'professional_status' => 'required',
        'phone' => 'required',
        'landline' => 'required',
        'nacionalidad' => 'required',
        'date_admission' => 'required',
        'img-cedula' => 'required',
        'img-nacimiento' => 'required',
        'parentesco' => 'required',
        'contracts_id' => 'required',
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
        'professional_status',
        'address',
        'phone',
        'landline',
        'nationality',
        'date_admission',
        'parentesco',
        'contracts_id',

        // otros campos aquí
     ];

    public function contracts(){
        return $this->hasMany(Contracts::class);
    }
}
