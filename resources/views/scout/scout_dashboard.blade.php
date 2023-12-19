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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>QTY</th>
                                        <th>Location</th>
                                        <th>Age</th>
                                        <th>Price</th>
                                        <th>Schedule</th>
                                        <th>Starting Date</th>
                                        <th>Description</th>
                                        <th>Enroll</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>
                                            @if ($event->qty == 0)
                                                <span class="text-danger">Full</span>
                                            @else
                                                {{ $event->qty }} / {{ $event->initial_qty }}
                                            @endif
                                        </td>                                        
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->age }}</td>
                                        <td>{{ $event->price }}</td>
                                        <td>{{ $event->event_type }}</td>
                                        <td>{{ $event->starts_at }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>
                                            @php
                                            // Calculate the difference in days between the starting date and the current date
                                            $differenceInDays = now()->diffInDays($event->starts_at);
                                        @endphp

                                        {{-- Check if the user is enrolled in the event --}}
                                        @if(auth()->check() && auth()->user()->isEnrolledInEvent($event))
                                            {{-- Check if the difference is less than 1 day --}}
                                            @if ($differenceInDays >= 1)
                                              <form method="post" action="{{ route('scout.unenroll', ['event' => $event]) }}" id="unenrollForm_{{ $event->id }}">
                                                @csrf
                                                @if($event->event_type === 'Weekly' || $event->event_type === 'Monthly')
                                                <form method="post" action="{{ route('scout.unenroll', ['event' => $event]) }}">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="text" name="unenroll_reason" class="form-control" placeholder="Enter reason for unenrollment" required>
                                                        <button type="submit" class="btn btn-danger">Unenroll</button>
                                                    </div>
                                                </form>
                                                @else
                                                <form method="post" action="{{ route('scout.unenroll', ['event' => $event]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Unenroll</button>
                                                </form>
                                                @endif

                                            @else
                                            <button type="button"  class="btn btn-outline-danger" onclick="showRestrictionMessage()">Restricted</button>
                                            @endif
                                        @else 
                                            {{-- If not enrolled, display the Enroll button --}}
                                            <form method="post" action="{{ route('event.enroll', ['event' => $event]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-info">Enroll</button>
                                            </form>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if (session()->has('success'))
                            <div>
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
<!--For the unenroll button and reason box -->
<script>
    function toggleUnenroll(eventId) {
        var unenrollReason = document.getElementById('unenrollReason_' + eventId);
        unenrollReason.style.display = unenrollReason.style.display === 'none' ? 'block' : 'none';
    }

    function submitUnenroll(eventId) {
        var unenrollReason = document.getElementById('unenrollReason_' + eventId).value;
        if (unenrollReason.trim() !== '') {
            document.getElementById('unenrollForm_' + eventId).submit();
        }
    }

    function showRestrictionMessage() {
        alert('Unenrollment is restricted within 24 hours of the event start. Please contact our support team for assistance.');
    }
</script>




</body>

</html>