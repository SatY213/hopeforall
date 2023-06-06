<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'budget',
        'starting_date',
        'ending_date',
        'images',
    ];

    
    

    public function benevoles()
    {
        return $this->belongsToMany(Benevole::class, 'benevole_project');
    }
    
    public function boughts()
    {
        return $this->hasMany(Bought::class);
    }

    

}


