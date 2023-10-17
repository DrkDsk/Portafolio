<?php

use App\Models\User;
use App\Enums\PermissionEnum;

it('can admin delete proyect', function () {
    $admin = User::factory()->create();
    $admin->assignRole(PermissionEnum::Administrador->value);

    $response = $this->actingAs($admin)->delete(route('admin.projects.destroy', 3));
    $result =  (bool)$response->getContent();

    $response
        ->assertStatus(200)
        ->assertSessionHasNoErrors();
});
