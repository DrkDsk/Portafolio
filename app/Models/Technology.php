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

    protected $appends = ['imagePath'];

    protected $fillable = ['name', 'path', 'years_experience'];

    public function getImagePathAttribute(): string
    {
        return asset("storage/" . $this->attributes['path']);
    }
}
