<?php

namespace App\Repository;

use App\Models\Technology;

class TechnologyRepository
{
    public function getAll()
    {
        return Technology::orderBy('created_at', 'DESC')->get();
    }

    public function create(string $name, string $path)
    {
        return Technology::create([
            'name' => $name,
            'path' => $path
        ]);
    }
}
