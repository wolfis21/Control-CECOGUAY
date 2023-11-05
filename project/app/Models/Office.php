<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    static $rules = [
		'address' => 'required',
        'num_contact' => 'required',
        'companies_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['address','num_contact','companies_id'];

    public function companies(){
        return $this->belongsTo(companies::class);
    }

    public function employess(){
        return $this->hasMany(Employess::class);
    }
    public function customers(){
        return $this->hasMany(Customers::class);
    }
}
