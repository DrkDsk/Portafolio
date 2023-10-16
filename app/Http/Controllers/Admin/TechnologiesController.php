<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use App\Repository\TechnologyRepository;
use App\Services\StorageService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TechnologiesController extends Controller
{
    public function __construct(
        private readonly StorageService $storageService,
        private readonly TechnologyRepository $technologyRepository
    )
    {
    }

    public function index(): Response
    {
        $technologies = $this->technologyRepository->getAll();

        return Inertia::render('Admin/Technologies/Index', [
            'technologies' => $technologies,
            'showCreateTechnologyButton' => true
        ]);
    }

    public function edit(Technology $technology): Response
    {
        return Inertia::render('Admin/Technologies/Edit', [
            'technology' => $technology
        ]);
    }

    public function create() : Response
    {
        return Inertia::render('Admin/Technologies/Create');
    }

    public function store(StoreTechnologyRequest $request): RedirectResponse
    {
        $path = $this->storageService->storeFile(Technology::PATH_IMAGE_TECHNOLOGY, $request->file('image'));
        $this->technologyRepository->create($request->validated(), $path);

        return redirect()->route('admin.technologies.index');
    }

    public function update(UpdateTechnologyRequest $request, Technology $technology): RedirectResponse
    {
        $this->storageService->updateTechnologyImage($technology);
        $technology->update(['name' => $request->get('name')]);

        return redirect()->route('admin.technologies.index');
    }

    public function destroy(Technology $technology): bool
    {
        if ($technology->path) {
            $this->storageService->delete($technology->path);
        }
        $technology->delete();

        return true;
    }
}
