<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Repository\ProjectRepository;
use Inertia\Response;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function __construct(private readonly ProjectRepository $projectRepository)
    {
    }

    public function index(): Response
    {
        return Inertia::render('Project/Index', [
            'myInfo'  => $this->projectRepository->myInfo(),
            'projects' => $this->projectRepository->getProjects()
        ]);
    }

    public function store(StoreProjectRequest $request): ProjectResource
    {
        $project = $this->projectRepository->store($request->validated());

        return (new ProjectResource($project));
    }
}
