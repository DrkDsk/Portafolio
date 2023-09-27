<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    const PATH_IMAGE_PROJECT = '/images/projects';
    use HasFactory;
    protected $fillable = ['project_id', 'path'];
}
