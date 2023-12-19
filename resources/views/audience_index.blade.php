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

    <title>Support Member</title>
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
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">Support
                                            Member</a>
                                        <h5 class="text-muted fw-normal mb-4">Be an Audiance! </h5>

                                        <!-- Log in -->
                                        <form method="POST" action="{{ route('storeNbuy') }}">
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
                                            <!-- Events -->
                                            <!-- Events -->
                                            <div class="mb-3">
                                                <div class="btn-group d-grid gap-2">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton4" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" style="width: 100%;">
                                                        Select an Event
                                                    </button>
                                                    <div class="dropdown-menu" style="width: 100%;">
                                                        @foreach ($events->where('allow_audience', true) as $event)
                                                            <a class="dropdown-item" href="#"
                                                                onclick="selectEvent('{{ $event->id }}')">
                                                                Event Title: {{ $event->name }} | Location:
                                                                {{ $event->location }} | Starting Date:
                                                                {{ $event->starts_at }} | Price: {{ $event->price }} €
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                    <input type="hidden" name="selectedEvent" id="selectedEvent"
                                                        value="{{ $events->first()->id }}">
                                                </div>
                                            </div>
                                            <!-- Register -->
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    Buy Ticket
                                                </button>

                                                <div class="ml-4 mt-3">
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        href="{{ route('main') }}">
                                                        {{ __('Dashboard') }}
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


    <!-- End custom js for this page -->
    <script>
        function selectEvent(eventId) {
            document.getElementById('selectedEvent').value = eventId;
            // Additional actions if needed
        }
    </script>

</body>

</html>
