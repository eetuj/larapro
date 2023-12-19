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
            
            
              <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                  <div class="card rounded">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                          <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo))? url('upload/admin_images/'.$profileData->photo): url('upload/no_image.jpg')
                          }}" alt="profile">
                          <span class="h4 ms-3 text">{{$profileData->name}}</span>
                        </div>
            
                      </div>
                      <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">User name:</label>
                        <p class="text-muted">{{$profileData->username}}</p>
                      </div>
                      <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted">{{$profileData->created_at}}</p>
                      </div>
                      <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{$profileData->email}}</p>
                      </div>
                      <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{$profileData->phone}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-8 middle-wrapper">
                  <div class="row">
                    <div class="card">
                      <div class="card-body">
            
                        <h6 class="card-title">Change Password</h6>
            
            
                        <form class="forms-sample" method="POST" action="{{route('scout.update.password')}}">
                          @csrf
            
                          <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control  @error('old_password') is-invalid @enderror " id="old_password">
                            @error('old_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
            
                          <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control  @error('new_password') is-invalid @enderror " id="new_password" >
                            @error('new_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
            
                          <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control " id="new_password_confirmation">
                          </div>
            
                          <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
            
                      </div>
                    </div>
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


</body>

</html>