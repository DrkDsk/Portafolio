<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use App\Services\StorageService;
use Inertia\Response;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function __construct(
        protected StorageService $storageService,
        protected ProjectRepository $projectRepository,
        protected TechnologyRepository $technologyRepository)
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
        $readme = $this->storageService->getReadmeProject($project);

        return Inertia::render('Project/ShowProject', [
            'project'      => $project,
            'images'       => $project->projectImages,
            'type'         => $project->projectType,
            'technologiesProject' => $project->technologyProjects()->with('technology')->get(),
            'showMarkdown' => true,
            'markdownContent' => $readme
        ]);
    }
}
