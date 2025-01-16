<?php

namespace App\Enum;

enum RolesEnum: string
{
    case ADMIN = 'Admin';
    case VENDOR = 'Vendor';
    case USER = 'User';
}
