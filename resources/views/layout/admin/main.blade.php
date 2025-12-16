<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="SekolahKarakter24">
    <meta name="author" content="SekolahKarakter24">
    <!-- Favicon icon -->
    {{-- <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"> --}}
    <link href="{{ asset('front/img/images/logo.png') }}" rel="icon">
    <link href="{{ asset('front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- bootstrap-icons -->
    <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- SweetAlert -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/sweetalert/sweetalert-1.1.3.min.css') }}">

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo bg-success">
                        <a class="mobile-menu" id="mobile-collapse" href="#">
                            <i class="ti-menu"></i>
                        </a>
                        <a href="{{ route('dashboard') }}">
                            <h5>Sekolah Karakter</h5>
                            {{-- <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Theme-Logo" /> --}}
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>

                            <li>
                                <a href="#" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            {{-- <li class="header-notification">
                                <a href="#">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-pink"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li> --}}
                            <li class="user-profile header-notification">
                                <a href="{{ route('profilku', auth()->user()->id) }}">
                                    @if (auth()->user()->jenis == 'admin')
                                        <img class="img-40 img-radius" src="{{ asset('front/img/images/logo.png') }}"
                                            alt="User-Profile-Image">
                                    @else
                                        <img class="img-40 img-radius" src="{{ asset('assets/images/user.png') }}"
                                            alt="User-Profile-Image">
                                    @endif

                                    <span>
                                        @if (auth()->user()->jenis == 'siswa')
                                            {{ auth()->user()->siswa->ppdbSiswa->nama }}
                                        @elseif (auth()->user()->jenis == 'gurugeneral')
                                            {{ auth()->user()->guruGeneral->nama }}
                                        @elseif (auth()->user()->jenis == 'siswageneral')
                                            {{ auth()->user()->siswaGeneral->nama }}
                                        @elseif (auth()->user()->jenis == 'walimurid')
                                            {{ auth()->user()->waliMurid->nama }}
                                        @else
                                            {{ auth()->user()->pegawai->nama }}
                                        @endif
                                    </span>
                                    {{-- <i class="ti-angle-down"></i> --}}
                                </a>
                                {{-- <ul class="show-notification profile-notification"> --}}
                                {{-- <a href="{{ route('profilku', auth()->user()->id) }}">
                                        <li><i class="ti-user"></i> Profil</li>
                                    </a>
                                    <a data-toggle="modal" data-target="#logoutModal">
                                        <li>
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </li>
                                    </a> --}}
                                {{-- <li>
                                        <a href="#">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li> --}}
                                {{-- <li>
                                        <a href="#">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li> --}}
                                {{-- <li>
                                        <a href="#">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li> --}}
                                {{-- </ul> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    @if (auth()->user()->jenis == 'admin')
                                        <img class="img-40 img-radius" src="{{ asset('front/img/images/logo.png') }}"
                                            alt="User-Profile-Image">
                                    @else
                                        <img class="img-40 img-radius" src="{{ asset('assets/images/user.png') }}"
                                            alt="User-Profile-Image">
                                    @endif

                                    <div class="user-details">
                                        <span>
                                            @if (auth()->user()->jenis == 'siswa')
                                                {{ auth()->user()->siswa->ppdbSiswa->nama }}
                                            @elseif (auth()->user()->jenis == 'gurugeneral')
                                                {{ auth()->user()->guruGeneral->nama }}
                                            @elseif (auth()->user()->jenis == 'siswageneral')
                                                {{ auth()->user()->siswaGeneral->nama }}
                                            @elseif (auth()->user()->jenis == 'walimurid')
                                                {{ auth()->user()->waliMurid->nama }}
                                            @else
                                                {{ auth()->user()->pegawai->nama }}
                                            @endif
                                        </span>
                                        <span id="more-details">{{ ucfirst(auth()->user()->jenis) }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Halaman</div>
                            <ul class="pcoded-item pcoded-left-item">
                                @yield('sidebar')
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.guest.logout')

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js') }}"></script>
    <!-- am chart -->
    <script src="{{ asset('assets/pages/widget/amchart/amcharts.min.js') }}"></script>
    <script src="{{ asset('assets/pages/widget/amchart/serial.min.js') }}"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="{{ asset('assets/pages/todo/todo.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript " src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo-12.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- SweetAlert-->
    <script src="{{ asset('assets/sweetalert/sweetalert-1.1.3.min.js') }}"></script>
    <!-- Datatables -->
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                sScrollX: "100%",
            });
        });
    </script>

</body>

</html>
