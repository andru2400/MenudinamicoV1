<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.14
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <!-- Icons-->
    <link href="{{ asset('admin/modules_coreui/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/modules_coreui/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/modules_coreui/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/modules_coreui/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    <div id ="app">
        <header-main :asset="'{{ $asset = asset('') }}'"></header-main>
        <div class="app-body">
            <sidebar-main :asset="'{{ $asset = asset('') }}'"></sidebar-main>
            <main class="main">
                    <!-- Breadcrumb-->
                    <div class="container-fluid">
                      <div class="animated fadeIn"></div>
                    </div>
                    <router-view class="m-3"></router-view>
                    {{-- @yield('content') --}}
            </main>
            <aside-main :asset="'{{ $asset = asset('') }}'"></aside-main>
        </div>
        <footer-main :asset="'{{ $asset = asset('') }}'"></footer-main>
    </div>

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('admin/modules_coreui/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/modules_coreui/popper.js/dist/umd/popper.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/modules_coreui/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('admin/modules_coreui/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('admin/modules_coreui/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/modules_coreui/@coreui/coreui/dist/js/coreui.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- @yield('additional_script') --}}
  </body>

</html>
