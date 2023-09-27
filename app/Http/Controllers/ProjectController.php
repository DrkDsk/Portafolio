<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyProjectRepository;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
        private readonly TechnologyProjectRepository $technologyProjectRepository)
    {
    }

    public function index(): Response
    {
        return Inertia::render('Project/Index', [
            'myInfo'  => $this->projectRepository->myInfo(),
            'projects' => $this->projectRepository->getProjects()
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Project/Create', [
            'technologies'    => $this->projectRepository->getTechnologies(),
            'typesOfProjects' => $this->projectRepository->getTypesOfProject()
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $technologies = $request->get('technologies');
        $project = $this->projectRepository->store($request->validated());
        $this->technologyProjectRepository->saveTechnologiesProject($project, $technologies);

        return redirect()->route('home');
    }
}
