<?php

use App\Models\ProjectType;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $projectTypes = ['frontend', 'backend', 'full stack'];
        foreach ($projectTypes as $projectType) {
            ProjectType::create(['name' => $projectType]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        ProjectType::query()->whereIn('name', ['frontend','backend', 'full stack'])->delete();
    }
};
