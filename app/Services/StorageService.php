<?php

namespace App\Services;

use App\Models\Project;

class StorageService
{
    public function storeImagesProject(Project $project, string $path_image_project): void
    {
        foreach (request()->images as $image) {
            $filename =  $image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs($path_image_project, $filename, ['disk' => 'public']);
            $project->projectImages()->create(['project_id' => $project->id, 'path' => $imagePath]);
        }
    }
}
