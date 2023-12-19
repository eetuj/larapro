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

    <title>Parent's Dashboard</title>

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
        @include('parent.body.sidebar')
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
                            <h6 class="card-title mb-0">My Children</h6>
                        </div>

                        <div class="table-responsive">

                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Unlink</th>
                                        <th>Enrolled Events</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($scouts as $scout)
                                        <tr>
                                            <td>{{ $scout->name }}</td>
                                            <td>{{ $scout->username }}</td>
                                            <td>{{ $scout->email }}</td>
                                            <td>{{ $scout->phone }}</td>
                                            <td>
                                                <form action="{{ route('parent.unlinkChild', $scout->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Unlink</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a class="btn btn-inverse-primary " href="{{ route('scout.viewEnrollments', $scout) }}">view</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Children linked.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if (session('success'))
                            <div id="success-alert" class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                        <div id="error-alert" class="alert alert-error mt-3">
                            {{ session('error') }}
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
    <!--Automatically hide the success message after 5 seconds -->
    <script>
      setTimeout(function() {
          var successAlert = document.getElementById('success-alert');
          if (successAlert) {
              successAlert.style.display = 'none';
          }
      }, 3000); // 5000 milliseconds = 5 seconds
  </script>

  

</body>

</html>
