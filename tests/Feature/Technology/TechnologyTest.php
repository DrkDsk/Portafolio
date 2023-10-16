<?php

use App\Models\User;
use App\Enums\PermissionEnum;

it('can create technology', function () {

    $admin = User::factory()->create();
    $admin->assignRole(PermissionEnum::Administrador->value);

    $response = $this->actingAs($admin)->post('/admin/technologies', [
        'name' => 'Laravel',
        'start_experience' => '2023-10-26',
        'finish_experience' => '2023-12-25',
        'image' => null
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('admin.technologies.index'));

});

it('can admin delete technology', function () {
    $admin = User::factory()->create();
    $admin->assignRole(PermissionEnum::Administrador->value);

    $response = $this->actingAs($admin)->delete('/admin/technologies/1');

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('admin.technologies.index'));

});
