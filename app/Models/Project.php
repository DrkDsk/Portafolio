<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'creation_year', 'creation_month', 'project_type_id'];

    public function projectImages() : HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function technologyProjects(): HasMany
    {
        return $this->hasMany(TechnologyProject::class);
    }
}
