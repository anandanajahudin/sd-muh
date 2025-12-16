<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta content="Sekolah Karakter, SD Muhammadiyah 24 Surabaya, muhammadiyah, ketintang" name="keywords"> --}}
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta
        content="Sekolah Islam Unggulan yang didirikan oleh Pimpinan Cabang Muhammadiyah Wonokromo pada tanggal 9 bulan Maret tahun 1978"
        name="description">

    <!--  untuk facebook-->
    <meta name="idfokus" content="" />
    <meta name="author" content="Sekolah Karakter SD Muhammadiyah 24 Surabaya" />
    <meta content="Sekolah Karakter SD Muhammadiyah 24 Surabaya" itemprop="headline" />
    <meta name="thumbnailUrl" content="https://sekolahkaraktersdm24.sch.id/front/img/header-logo.png"
        itemprop="thumbnailUrl" />
    <meta property="article:author" content="https://www.instagram.com/sdm24ketintang" itemprop="author" />
    <meta property="article:publisher" content="https://www.instagram.com/sdm24ketintang" />
    <meta content="https://sekolahkaraktersdm24.sch.id" itemprop="url" />

    <title>Sekolah Karakter 24 | @yield('content-title')</title>

    @include('layout.guest.script')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Topbar -->
        @include('layout.guest.topbar')
        <!-- /.Topbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-4">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layout.guest.footer')
    </div>
    <!-- ./wrapper -->
    @include('layout.guest.script')
</body>

</html>
