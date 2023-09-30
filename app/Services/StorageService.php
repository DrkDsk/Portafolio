<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function storeImagesProject(Project $project, string $path_image_project): void
    {
        $images = request()->images;
        $cover = request()->cover;
        $images ? array_unshift($images, $cover) : $images[] = $cover;
        foreach ($images as $image) {
            $filename =  $image->getClientOriginalName();
            $imagePath = $image->storeAs($path_image_project, $filename, ['disk' => 'public']);
            $project->projectImages()->create(['project_id' => $project->id, 'path' => $imagePath]);
        }
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

    public function downloadCV()
    {
        try {
            $fileCvPath = Storage::path('public/personal/cv.pdf');
            $headers = array('Content-type:application/pdf');

            return response()->download($fileCvPath, 'cv.pdf');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function storeImageTechnology(string $path_image_technology)
    {
        $image = request()->image;
        $fileName = $image->getClientOriginalName();
        return $image->storeAs($path_image_technology, $fileName, ['disk' => 'public']);
    }

    public function updateTechnologyImage(Technology $technology)
    {
        if (request()->hasFile('image')) {
            $newImageSaved = $this->storeImageTechnology(Technology::PATH_IMAGE_TECHNOLOGY);

            if ($technology->path) {
                $this->delete($technology->path);
            }

            $technology->update(['path' => $newImageSaved]);
        }
    }

    public function delete(string $imagePath): void
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }


}
