<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case EMPLOYER = 'employer';
    case EMPLOYEE = 'employee';
}