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

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/supportMemeber">Support Member</a></li>
            <li class="breadcrumb-item active" aria-current="page">receipt</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <a href="#" class="noble-ui-logo logo-light d-block mt-3">Scout<span>Pro</span></a>
                            <h5 class="mt-1 mb-2 text-muted">Invoice to :</h5>

                            <p>{{ $profileData->name }}<br> {{ $profileData->email }}<br> {{ $profileData->phone }}</p>
                        </div>
                        <div class="col-lg-3 pe-0">
                            <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">receipt</h4>
                            <h6 class="text-end">Price:</h6>
                            <h4 class="text-end fw-normal">{{ $event->price }}</h4>
                            <h6 class="mb-0 mt-3 text-end fw-normal">
                              <span class="text-muted">Invoice Date :</span>
                              {{ date('jS M Y') }}
                          </h6>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Event Title</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->location }}</td>
                                            <td>{{ $event->price }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid w-100">
                        <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-printer me-2 icon-md">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                </path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
