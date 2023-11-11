<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'required',
        'price' => 'required',
    ];

    protected $fillable = ['name','price'];

}
