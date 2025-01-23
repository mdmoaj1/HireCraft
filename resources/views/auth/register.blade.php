<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Registration</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Custom styles -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0061f2 0%, #00ba88 100%);
        }
        .form-input-focus {
            @apply focus:ring-2 focus:ring-blue-500 focus:border-blue-500;
        }
        .custom-input {
            @apply transition-all duration-300 border border-gray-200 rounded-lg px-4 py-3 bg-gray-50 focus:bg-white hover:border-blue-300;
        }
        .floating-label {
            @apply absolute left-3 transition-all duration-200 transform -translate-y-6 scale-75 top-4 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-6 text-blue-600;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl w-full space-y-8" x-data="{ userType: 'employee' }">
            <!-- Header with enhanced styling -->
            <div class="text-center space-y-4">
                <div class="flex justify-center">
                    <div class="h-16 w-16 bg-gradient-to-br from-blue-600 to-teal-400 rounded-xl shadow-lg flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="mt-6 text-4xl font-extrabold text-gray-900 tracking-tight">
                    Join Our Global Talent Network
                </h2>
                <p class="mt-2 text-lg text-gray-600">
                    Connect with the world's leading companies and opportunities
                </p>
            </div>

            <!-- Enhanced Registration Type Toggle -->
            <div class="flex justify-center space-x-4 p-1 bg-gray-100 rounded-xl">
                <button 
                    @click="userType = 'employee'"
                    :class="{'gradient-bg shadow-lg transform scale-105': userType === 'employee', 'bg-transparent hover:bg-gray-200': userType !== 'employee'}"
                    class="w-full px-6 py-3 rounded-lg font-medium transition-all duration-300 text-center">
                    <span :class="userType === 'employee' ? 'text-white' : 'text-gray-700'">Job Seeker</span>
                </button>
                <button 
                    @click="userType = 'employer'"
                    :class="{'gradient-bg shadow-lg transform scale-105': userType === 'employer', 'bg-transparent hover:bg-gray-200': userType !== 'employer'}"
                    class="w-full px-6 py-3 rounded-lg font-medium transition-all duration-300 text-center">
                    <span :class="userType === 'employer' ? 'text-white' : 'text-gray-700'">Employer</span>
                </button>
            </div>

            <!-- Employee Registration Form -->
            <div x-show="userType === 'employee'" class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <form id="employeeForm" class="space-y-6" action="{{ route('register.employee') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Basic Information -->
                        <div class="space-y-6">
                            <div class="relative">
                                <input type="text" name="name" placeholder=" " 
                                    class="custom-input peer w-full">
                                <label class="floating-label">Full Name</label>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Employment Type</label>
                                <select name="employment_type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                                    <option value="full_time">Full Time</option>
                                    <option value="part_time">Part Time</option>
                                    <option value="contract">Contract</option>
                                    <option value="freelance">Freelance</option>
                                </select>
                            </div>
                        </div>

                        <!-- Professional Information -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Professional Headline</label>
                                <input type="text" name="headline" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Skills</label>
                                <select name="skills[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                                    <!-- Add your skills options here -->
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                                <input type="url" name="linkedin_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Availability</label>
                                <select name="availability" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                                    <option value="immediate">Immediate</option>
                                    <option value="2_weeks">2 Weeks Notice</option>
                                    <option value="month">1 Month Notice</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Portfolio URL</label>
                                <input type="url" name="portfolio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Education</label>
                                <div class="space-y-2">
                                    <input type="text" name="education[]" required placeholder="Degree, Institution" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                                    <!-- Add button to dynamically add more education fields if needed -->
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Employment History</label>
                                <div class="space-y-2">
                                    <input type="text" name="employment_history[]" placeholder="Position, Company" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                                    <!-- Add button to dynamically add more employment history fields if needed -->
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Certifications</label>
                                <div class="space-y-2">
                                    <input type="text" name="certifications[]" placeholder="Certification name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                                    <!-- Add button to dynamically add more certification fields if needed -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" 
                            class="gradient-bg text-white px-8 py-4 rounded-xl font-medium hover:opacity-90 transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>

            <!-- Employer Registration Form -->
            <div x-show="userType === 'employer'" class="bg-white p-8 rounded-xl shadow-lg">
                <form id="employerForm" class="space-y-6" action="{{ route('register.employer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Company Information -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Company Name</label>
                                <input type="text" name="company_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Website URL</label>
                                <input type="url" name="website_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Industry</label>
                                <select name="industry" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                                    <!-- Add your industry options here -->
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Company Logo</label>
                                <input type="file" name="company_logo" class="mt-1 block w-full">
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Contact Name</label>
                                <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm form-input-focus">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="gradient-bg text-white px-8 py-3 rounded-lg font-medium hover:opacity-90 transition-opacity">
                            Create Employer Account
                        </button>
                    </div>
                </form>
            </div>

            <!-- Enhanced Login Link -->
            <div class="text-center bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <p class="text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" 
                        class="font-medium text-blue-600 hover:text-blue-500 underline decoration-2 decoration-blue-500/30 hover:decoration-blue-500">
                        Sign in here
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Error Handling Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const handleSubmit = async (formId, endpoint) => {
                const form = document.getElementById(formId);
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const formData = new FormData(form);
                    
                    try {
                        const response = await fetch(endpoint, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            },
                            credentials: 'same-origin'
                        });

                        const data = await response.json();
                        
                        if (!response.ok) {
                            const errors = Object.values(data).flat().join('\n');
                            throw new Error(errors || 'Registration failed');
                        }

                        // Redirect on success
                        window.location.href = '/dashboard';
                    } catch (error) {
                        alert(error.message);
                    }
                });
            };

            handleSubmit('employeeForm', '{{ route("register.employee") }}');
            handleSubmit('employerForm', '{{ route("register.employer") }}');
        });
    </script>
</body>
</html>
