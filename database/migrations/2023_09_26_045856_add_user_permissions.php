<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Enums\PermissionEnum;

return new class extends Migration
{
    private array $permissions = [
        'can view projects',
        'can create projects',
        'can edit projects',
        'can delete projects',
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::findByName(PermissionEnum::Administrador->value);
        $admin->givePermissionTo($this->permissions);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $admin = Role::findByName(PermissionEnum::Administrador->value);
        $admin->revokePermissionTo($this->permissions);

        foreach ($this->permissions as $permission) {
            Permission::findByName($permission)->delete();
        }
    }
};
