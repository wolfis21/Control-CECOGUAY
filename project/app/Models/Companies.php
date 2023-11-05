<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    static $rules = [
		'rif_companies' => 'required',
        'name' => 'required',
        'description' => 'required',
        'num_contact' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rif_companies','name','description', 'num_contact'];

    public function offices(){
        return $this->hasMany(Office::class);
    }
}
