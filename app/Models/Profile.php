<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        // Employee fields
        'headline',
        'skills',
        'portfolio',
        'certifications',
        'education',
        'employment_history',
        'availability',
        'employment_type',
        'linkedin_url',
        // Employer fields
        'company_name',
        'company_logo',
        'website_url',
        'contact_information',
        'industry',
        'domain',
    ];

    protected $casts = [
        'skills' => 'array',
        'certifications' => 'array',
        'education' => 'array',
        'employment_history' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
