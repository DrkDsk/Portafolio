<?php

namespace App\Services;

use App\Models\Project;

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
}
