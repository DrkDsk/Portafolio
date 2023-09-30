<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
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
        return Inertia::render('Home', [
            'myInfo'  => $this->projectRepository->myInfo(),
            'projects' => $this->projectRepository->getProjects()
        ]);
    }
}
