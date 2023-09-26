<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Enums\PermissionEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $admin = User::factory()->create([
            'name' => 'alfredopalacios',
            'email' => 'admin@app.com',
        ]);

        $admin->assignRole(PermissionEnum::Administrador->value);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::query()->where('email', 'admin@app.com')->delete();
    }
};
