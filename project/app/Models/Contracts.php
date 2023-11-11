<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;

    static $rules = [
        'date_admission' => 'required',
        'cost-semanal' => 'required',
        'semana-cobro' => 'required',
        'atrasos' => 'required',
        'suspendido' => 'required',
        'type-service' => 'required',
        'customers_id' => 'required',
    ];

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function typeService(){
        return $this->belongsTo(TypeService::class);
    }

}
