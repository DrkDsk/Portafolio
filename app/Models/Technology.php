<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table = 'technologies';
    const PATH_IMAGE_TECHNOLOGY = '/images/technologies';

    protected $appends = ['fullImagePath', 'startExperience'];

    protected $fillable = ['name', 'path', 'start_experience', 'finish_experience'];

    public function getFullImagePathAttribute(): string
    {
        return asset("storage/" . $this->attributes['path']);
    }

    public function getStartExperienceAttribute(): string
    {
        return Carbon::parse($this->attributes['start_experience'])->format('m/Y');
    }

    public function getFinishExperience(): string
    {
        return Carbon::parse($this->attributes['finish_experience'])->format('m/Y');
    }
}
