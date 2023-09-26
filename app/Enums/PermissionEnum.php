<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case Administrador = 'administrador';
    case CanViewProjects = 'can view projects';
    case CanCreateProjects = 'can create projects';
    case CanEditProjects = 'can edit projects';
    case CanDeleteProjects = 'can delete projects';
}
