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
        protected ProjectRepository $projectRepository,
        protected TechnologyProjectRepository $technologyProjectRepository,
        protected  StorageService $storageService)
    {
    }

    public function index() : Response
    {
        return Inertia::render('Admin/Project/Index', [
            'showCreateProjectButton' => true,
            'projects' => $this->projectRepository->getProjects()
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
            'markdownContent' => $readme
        ]);
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

    public function destroy(Project $project): bool|string
    {
        try {
            collect($project->projectImages)->map(function ($image) {
                $this->storageService->delete($image->path);
            });

            $project->technologyProjects()->delete();
            $project->projectImages()->delete();
            $project->delete();

            return true;
        } catch (\Throwable $throwable) {
            return false;
        }
    }
}
