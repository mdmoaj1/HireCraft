<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Employee fields
            $table->string('headline')->nullable();
            $table->json('skills')->nullable();
            $table->text('portfolio')->nullable();
            $table->json('certifications')->nullable();
            $table->json('education')->nullable();
            $table->json('employment_history')->nullable();
            $table->string('availability')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('linkedin_url')->nullable();
            // Employer fields
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('website_url')->nullable();
            $table->text('contact_information')->nullable();
            $table->string('industry')->nullable();
            $table->string('domain')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};