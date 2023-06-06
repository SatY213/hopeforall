<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'quantity',
        'unit_price',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    

    
    
}
