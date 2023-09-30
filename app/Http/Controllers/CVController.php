<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCVRequest;
use App\Services\StorageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        /*$fileCvPath = Storage::path('public/personal/cv.pdf');
        $headers = array('Content-type:application/pdf');
        */

        $file = public_path(). "/storage/personal/cv.pdf";
        $headers = ['Content-Type' => 'application/pdf'];

        return response()->download($file, 'filename.pdf', $headers);
    }
}
