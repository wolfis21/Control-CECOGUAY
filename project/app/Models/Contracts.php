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
        'observaciones' => 'required',
        'type_services_id' => 'required',
        'customers_id' => 'required',
    ];

    protected $fillable = ["date_admission", "cost-semanal", "semana-cobro","atrasos", "suspendido","observaciones", "type_service_id","customers_id"];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }

    public function typeService(){
        return $this->belongsTo(TypeService::class, 'type_services_id','id');
    }

}
