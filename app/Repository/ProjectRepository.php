<?php

namespace App\Repository;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProjectRepository
{
    public function getProjects(): Collection | array
    {
        return Project::with('projectImages')->get();
    }

    public function getTechnologies(): Collection
    {
        return Technology::all();
    }

    public function getTypesOfProject(): Collection
    {
        return ProjectType::all();
    }

    public function myInfo(): array
    {
        return [
            'github' => config('social.github'),
            'linkedin' => config('social.linkedin')
        ];
    }

    public function store(array $data): Model|Builder
    {
        return Project::query()->create([
            'name'           => $data['name'],
            'description'    => $data['description'],
            'creation_year'  => $data['creation_year'],
            'creation_month' => $data['creation_month']
        ]);
    }
}
