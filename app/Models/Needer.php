<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Needer extends Model
{
    protected $table = 'needers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'job',
        'address',
        'birthday',
        'children',
        'salary',
        'description'
        
    ];
}
