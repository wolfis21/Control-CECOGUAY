<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    static $rules = [
		'cedula' => 'required',
        'name' => 'required',
        'subname' => 'required',
        'date_n' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'offices_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','name','subname', 'date_n', 'address', 'phone', 'offices_id'];

    public function office(){
        return $this->belongsTo(Office::class,'offices_id', 'id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
