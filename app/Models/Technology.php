<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table = 'technologies';
    const PATH_IMAGE_TECHNOLOGY = '/images/technologies';

    protected $appends = ['fullImagePath'];

    protected $fillable = ['name', 'path'];

    public function getFullImagePathAttribute(): string
    {
        return asset("storage/" . $this->path);
    }
}
