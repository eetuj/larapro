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

    <title>Scout's Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="backend/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('scout.body.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('scout.body.header')
            <!-- partial -->

            {{-- @yield('scout') --}}
            <div class="page-content">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">events</h6>
                        </div>
                        <div class="table-responsive">

                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Location</th>
                                        <th>Enrollment Date</th>
                                        <th>Unenroll</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrollments as $enrollment)
                                        <tr>
                                            <td>{{ $enrollment->event->name }}</td>
                                            <td>{{ $enrollment->event->location }}</td>
                                            <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @php
                                                    // Calculate the difference in days between the starting date and the current date
                                                    $differenceInDays = now()->diffInDays($enrollment->event->starts_at);
                                                @endphp

                                                {{-- Check if the difference is less than 1 day --}}
                                                @if ($differenceInDays >= 1)

                                                    <form method="post" action="{{ route('scout.unenroll', ['event' => $enrollment->event]) }} id="unenrollForm_{{ $enrollment->event->id }}">
                                                        @csrf
                                                        @if($enrollment->event->event_type === 'Weekly' || $enrollment->event->event_type === 'Monthly')
                                                        <form method="post" action="{{ route('scout.unenroll', ['event' => $enrollment->event]) }}">
                                                            @csrf
                                                            <div class="input-group">
                                                                <input type="text" name="unenroll_reason" class="form-control" placeholder="Enter reason for unenrollment" required>
                                                                <button type="submit" class="btn btn-danger">Unenroll</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                    <form method="post"  action="{{ route('scout.unenroll', ['event' => $enrollment->event]) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Unenroll</button>
                                                    </form>
                                                    @endif

                                                @else
                                                    {{-- If less than 1 day, display a disabled button --}}
                                                    <button type="button" class="btn btn-outline-danger" disabled>Event Starts
                                                        in less than 24h, Contact support to unenroll</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (session('success'))
                                <div id="success-alert" class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- partial:partials/_footer.html -->
            @include('body.footer')
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
    <!-- End custom js for this page -->
    <script>
        function toggleUnenroll(eventId) {
            var unenrollReason = document.querySelector(`[name="unenroll_reason_${eventId}"]`);
            unenrollReason.style.display = unenrollReason.style.display === 'none' ? 'block' : 'none';
            
        }
    </script>


</body>

</html>
