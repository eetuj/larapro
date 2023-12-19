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

            <h6 class="card-title">Update Profile</h6>


            <form class="forms-sample" method="POST" action="{{route('scout.profile.store')}}" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername1" value={{"$profileData->username"}}>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value={{"$profileData->name"}}>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value={{"$profileData->email"}}>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value={{"$profileData->phone"}}>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Photo</label>
                <input class="form-control"  name="photo" type="file" id="image">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo))? url('upload/admin_images/'.$profileData->photo): url('upload/no_image.jpg')
              }}" alt="profile">
              </div>
              <button type="submit" class="btn btn-primary me-2">Save Changes</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
  $(document).ready(function(){
      $('#uploadimage').on('change', function(e){
          $('#showimage').attr('src', URL.createObjectURL(e.target.files[0]));
      });
  });
</script>

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