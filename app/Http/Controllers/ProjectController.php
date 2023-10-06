<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Illuminate\Support\Facades\Storage;
use Inertia\Response;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
        private readonly  TechnologyRepository $technologyRepository)
    {
    }

    public function index(): Response
    {
        return Inertia::render('Home', [
            'myInfo'  => $this->projectRepository->myInfo(),
            'projects' => $this->projectRepository->getProjects(),
            'technologies' => $this->technologyRepository->getAll(),
        ]);
    }

    public function show(Project $project): Response
    {
        $readme = null;
        if ($project->readme && Storage::exists('public/'. $project->readme)) {
            $readme = Storage::disk('public')->get($project->readme);
        }

        return Inertia::render('Project/ShowProject', [
            'project'      => $project,
            'images'       => $project->projectImages,
            'type'         => $project->projectType,
            'technologiesProject' => $project->technologyProjects()->with('technology')->get(),
            'markdownContent' => $readme
        ]);
    }
}
