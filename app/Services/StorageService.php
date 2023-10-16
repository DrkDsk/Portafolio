<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StorageService
{
    public function storeImagesProject(Project $project): void
    {
        $images = request()->images;
        $cover = request()->cover;
        $images ? array_unshift($images, $cover) : $images[] = $cover;
        foreach ($images as $image) {
            $filename =  $image->getClientOriginalName();
            $imagePath = $image->storeAs(ProjectImage::PATH_IMAGE_PROJECT, $filename, ['disk' => 'public']);
            $project->projectImages()->create(['project_id' => $project->id, 'path' => $imagePath]);
        }
    }

    public function storeFile(string $path_readme, $file)
    {
        if ($file) {
            $fileName = $file->getClientOriginalName();
            return $file->storeAs($path_readme, $fileName, ['disk' => 'public']);
        }

        return null;
    }

    public function storeCv() : string
    {
        $cvFile = request()->file;
        $this->deleteCurrentCV();

        return $cvFile->storeAs('personal', 'cv.pdf', ['disk' => 'public']);
    }

    public function deleteCurrentCV(): void
    {
        try {
            Storage::disk('public')->delete('personal/cv.pdf');
        } catch (\Exception $exception) {}
    }

    public function getCVPath(): ?string
    {
        if ( Storage::disk('public')->exists('personal/cv.pdf')) {
            return 'public/personal/cv.pdf';
        }

        return null;
    }

    public function downloadCV(): BinaryFileResponse
    {
        $file = public_path(). "/storage/personal/cv.pdf";
        $headers = ['Content-Type' => 'application/pdf'];

        return response()->download($file, 'filename.pdf', $headers);
    }

    public function updateTechnologyImage(Technology $technology): void
    {
        if (request()->hasFile('image')) {
            $newImageSaved = $this->storeFile(Technology::PATH_IMAGE_TECHNOLOGY, request()->image);
            $technology->update(['path' => $newImageSaved]);
        }
    }

    public function delete(string $imagePath): void
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    public function getReadmeProject(Project $project): ?string
    {
        $readme = null;
        if ($project->readme && Storage::exists('public/'. $project->readme)) {
            $readme = Storage::disk('public')->get($project->readme);
        }
        return $readme;
    }

}
