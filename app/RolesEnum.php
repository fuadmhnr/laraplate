<?php

namespace App;

enum RolesEnum: string
{
    case WRITER = "writer";
    case ADMIN = "admin";
    case SUPERADMIN = "Super-Admin";
}
