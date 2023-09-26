<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use App\Enums\PermissionEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Role::create(['name' => PermissionEnum::Administrador->value]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Role::findByName(PermissionEnum::Administrador->value)->delete();
    }
};
