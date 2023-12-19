<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Registration</title>
    <style type="text/css">
        .authlogin-side-wrapper {
            height: 100%;
            width: 100%;
            background-image: url({{ asset('upload/login.png') }});

        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="backend/assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="authlogin-side-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-12 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="{{ route('main') }}"
                                            class="noble-ui-logo logo-light d-block mb-2">Scouts<span>Pro</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Registration form</h5>

                                        <!-- Log in -->
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <!-- Name -->
                                            <div class="mb-3">
                                                <label class="form-label" for="name"
                                                    :value="__('Name')">Name</label>
                                                <input id="name" class="form-control" type="text" name="name"
                                                    :value="old('name')" required autofocus autocomplete="name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>

                                            <!-- Email Address -->
                                            <div class="mb-3">
                                                <label class="form-label" for="email" :value="__('Email')">
                                                    Email</label>
                                                <input id="email" class="form-control" type="email" name="email"
                                                    :value="old('email')" required autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- Phone -->
                                            <div class="mb-3">
                                                <label for="phone" :value="__('Phone')">Phone</label>
                                                <input id="phone" class="form-control" type="text" name="phone"
                                                    :value="old('phone')" required />
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                            </div>
                                            <!-- Username -->
                                            <div class="mb-3">
                                                <label for="username" :value="__('Username')">Username</label>
                                                <input id="username" class="form-control" type="text"
                                                    name="username" :value="old('username')" required />
                                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                            </div>
                                            <!-- Role -->
                                            <div class="mb-3">
                                                <label for="role" class="form-label ">Select Role</label>
                                                <div class="btn-group mr-12">
                                                    <button type="button" class="btn btn-primary dropdown-toggle "
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Scout
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"
                                                            onclick="selectRole('Scout')">Scout</a>
                                                        <a class="dropdown-item" href="#"
                                                            onclick="selectRole('Parent')">Parent</a>
                                                        <a class="dropdown-item" href="#"
                                                            onclick="selectRole('Admin')">Admin</a>
                                                    </div>
                                                    <input type="hidden" name="role" id="selectedRole"
                                                        value="Scout">
                                                </div>
                                            </div>

                                            <!-- Age -->
                                            <div class="mt-4" id="underAgeCheckbox">
                                                <label for="under_age" class="form-label ">Are you under age?</label>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="under_age"
                                                        name="under_age">
                                                    <label class="form-check-label  mb-3" for="under_age">Yes</label>
                                                </div>
                                            </div>


                                            <!-- Password -->
                                            <div class="mb-3">
                                                <label for="password" :value="__('Password')">Password</label>

                                                <input id="password" class="form-control" type="password"
                                                    name="password" required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mb-3">
                                                <label for="password_confirmation"
                                                    :value="__('Confirm Password')">Confirm Password</label>

                                                <input id="password_confirmation" class="form-control"
                                                    type="password" name="password_confirmation" required
                                                    autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                            <!-- Register -->
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary btn-lg">
                                                    {{ __('Sign up') }}
                                                </button>

                                                <div class="ml-4 mt-3">
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        href="{{ route('login') }}">
                                                        {{ __('Already a user? Sign in') }}
                                                    </a>
                                                </div>
                                            </div>


                                        </form>
                                        <script>
                                            function selectRole(role) {
                                                document.getElementById('selectedRole').value = role;
                                                document.querySelector('.btn.btn-primary.dropdown-toggle').innerText = role;
                                                toggleUnderAgeCheckbox(); // Call the function to handle other UI changes based on role
                                            }

                                            function toggleUnderAgeCheckbox() {
                                                var roleSelect = document.getElementById('selectedRole');
                                                var underAgeCheckbox = document.getElementById('underAgeCheckbox');

                                                if (roleSelect.value === 'Scout') {
                                                    underAgeCheckbox.style.display = 'block';
                                                } else {
                                                    underAgeCheckbox.style.display = 'none';
                                                }
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="{{ 'backend/assets/vendors/core/core.js' }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ 'backend/assets/vendors/feather-icons/feather.min.js' }}"></script>
    <script src="{{ 'backend/assets/js/template.js' }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

</body>

</html>
