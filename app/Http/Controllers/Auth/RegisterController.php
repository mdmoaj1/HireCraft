<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'headline' => 'nullable|string|max:255',
            'skills' => 'nullable|array',
            'portfolio' => 'nullable|string',
            'certifications' => 'nullable|array',
            'education' => 'required|array',
            'employment_history' => 'nullable|array',
            'availability' => 'required|string',
            'employment_type' => 'required|string',
            'linkedin_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee',
        ]);

        $user->profile()->create([
            'headline' => $request->headline,
            'skills' => $request->skills,
            'portfolio' => $request->portfolio,
            'certifications' => $request->certifications,
            'education' => $request->education,
            'employment_history' => $request->employment_history,
            'availability' => $request->availability,
            'employment_type' => $request->employment_type,
            'linkedin_url' => $request->linkedin_url,
        ]);

        return response()->json(['message' => 'Registration successful'], 201);
    }

    public function registerEmployer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'website_url' => 'required|url',
            'industry' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employer',
        ]);

        $logoPath = null;
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
        }

        $user->profile()->create([
            'company_name' => $request->company_name,
            'company_logo' => $logoPath,
            'website_url' => $request->website_url,
            'industry' => $request->industry,
        ]);

        return response()->json(['message' => 'Registration successful'], 201);
    }
}
