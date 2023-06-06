<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevole extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'birthday', 'job', 'address', 'phone','type'];

    
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'benevole_project');
    }
    
}
