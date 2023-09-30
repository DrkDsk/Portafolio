<?php

namespace App\Http\Controllers;

use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
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
}
