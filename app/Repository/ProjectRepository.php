<?php

namespace App\Repository;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function getProjects(): Collection | array
    {
        return Project::with('projectImages', 'projectType')->orderBy('created_at', 'DESC')->get();
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

    public function store(array $data): Project
    {
        return Project::create([
            'name'            => $data['name'],
            'description'     => $data['description'],
            'github_link'     => request()->github,
            'creation_year'   => $data['creation_year'],
            'creation_month'  => $data['creation_month'],
            'project_type_id' => $data['type']
        ]);
    }
}
