<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnologyProject extends Model
{
    use HasFactory;
    protected $table = 'technologies_project';
    protected $fillable = ['technology_id'];

    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }
}
