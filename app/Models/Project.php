<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'github_link', 'readme', 'creation_year', 'creation_month', 'project_type_id'];
    const README_PATH = "readmes";

    public function projectImages() : HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function technologyProjects(): HasMany
    {
        return $this->hasMany(TechnologyProject::class);
    }

    public function ProjectType(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class);
    }
}
