<?php

namespace App\Repository;

use App\Models\Project;

class TechnologyProjectRepository
{

    public function saveTechnologiesProject (Project $project, array $technologies): Project
    {
        array_map(function ($value) use ($project) {
            $project->technologyProjects()->create(['technology_id' => $value]);
        }, $technologies);

        return $project;
    }
}
