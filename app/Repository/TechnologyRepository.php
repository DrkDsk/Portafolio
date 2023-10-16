<?php

namespace App\Repository;

use App\Models\Technology;

class TechnologyRepository
{
    public function getAll()
    {
        return Technology::orderBy('created_at', 'DESC')->get();
    }

    public function create(array $data, string|null $path)
    {
        return Technology::create([
            'name' => $data['name'],
            'path' => $path,
            'start_experience'  => $data['start_experience'],
            'finish_experience' => $data['finish_experience'],
        ]);
    }
}
