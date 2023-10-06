<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCVRequest;
use App\Services\StorageService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CVController extends Controller
{

    public function __construct(private readonly StorageService $storageService)
    {
    }

    public function index(): Response
    {
        $cvPath = $this->storageService->getCVPath();

        return Inertia::render('Admin/CV/Index', [
            'cvPath' => $cvPath
        ]);
    }

    public function create() : Response
    {
        return Inertia::render('Admin/CV/Create');
    }

    public function store(StoreCVRequest $request): RedirectResponse
    {
        $this->storageService->storeCv();

        return redirect()->route('admin.cv.index');
    }

    public function download(): BinaryFileResponse
    {
        return $this->storageService->downloadCV();
    }
}
