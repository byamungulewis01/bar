<!DOCTYPE html>
<!-- beautify ignore:start -->

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template">

  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>RBA MIS</title>
    
    <meta name="description" content="Rwanda bar association management information system" />
    <meta name="keywords" content="rba, rwanda bar association, rba mis, rba management information system">

    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="{{ asset('assets/fonts/googleapis.com/index.html') }}">
    <link rel="preconnect" href="{{ asset('assets/fonts/gstatic.com/index.html') }}" crossorigin>
    <link href="{{ asset('assets/fonts/googleapis.com/css28ebe.css?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-faq.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>  
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar layout-without-menu">
  <div class="layout-container">

    <!-- Layout container -->
    <div class="layout-page">

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y d-flex ">
          
          
          <form class="d-flex flex-grow-1" method="GET">
            <div class="faq-header d-flex flex-column align-items-center rounded flex-grow-1" style="background: none">
              @guest
              <a href="{{ route('login') }}" class="btn btn-dark waves-effect align-self-end waves-light" style="z-index:10">Sign In</a>
              @endguest
              @auth()->user()
              <a href="{{ route('dashboard') }}" class="btn btn-dark waves-effect align-self-end waves-light" style="z-index:10">Go to dashboard</a>
              @endauth
              <img src="{{ asset('assets/logo/bar-logo.png') }}" class="mt-5" alt="RBA Logo" height="140">
                @csrf
              <div class="input-wrapper mb-3 input-group input-group-lg rounded-pill input-group-merge align-self-center pt-4">
                <span class="input-group-text" id="basic-addon1"><i class="ti ti-search"></i></span>
                <input type="text" class="form-control form-control-lg prefetch border-left-0 rounded-0 rounded-end bg-white" placeholder="" aria-label="Search" aria-describedby="basic-addon1" name="search" />
            
              </div>
              <button type="submit" class="btn btn-label-dark waves-effect mt-2">RBA Search</button>
            </div>
          </form>

            
          </div>
          <!-- / Content -->
          <x:footer/>          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    
  </div>
  <!-- / Layout wrapper -->



  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
  
  <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/bloodhound/bloodhound.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  
  

  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Page JS -->
  <script>
    "use strict";
    $(function(){
      $(".prefetch").typeahead(
        {
          hint:!isRtl,
          highlight:!0,
          minLength:1
        },
        {
          name:"states",
          source:new Bloodhound({
            datumTokenizer:Bloodhound.tokenizers.whitespace,
            queryTokenizer:Bloodhound.tokenizers.whitespace,
            prefetch:"http://localhost:8000/api/search"
          })
        }
      )
    });
  </script>
  
  
</body>

</html>

<!-- beautify ignore:end -->