<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyProjectRepository;
use App\Services\StorageService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
        private readonly TechnologyProjectRepository $technologyProjectRepository,
        private readonly  StorageService $storageService)
    {
    }

    public function index() : Response
    {
        return Inertia::render('Admin/Project/Index', [
            'projects' => $this->projectRepository->getProjects()
        ]);
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Project/Create', [
            'technologies'    => $this->projectRepository->getTechnologies(),
            'typesOfProjects' => $this->projectRepository->getTypesOfProject()
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $technologies = $request->get('technologies');
        $project = $this->projectRepository->store($request->validated());
        $this->technologyProjectRepository->saveTechnologiesProject($project, $technologies);
        $this->storageService->storeImagesProject($project);
        $pathReadme = $this->storageService->storeFile(Project::README_PATH, $request->file('readme'));
        $project->update(['readme' => $pathReadme]);

        return redirect()->route('admin.projects.index');
    }
}
