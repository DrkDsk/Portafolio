<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyProject extends Model
{
    use HasFactory;
    protected $table = 'technologies_project';
    protected $fillable = ['technology_id'];
}
