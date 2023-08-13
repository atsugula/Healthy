<!DOCTYPE html>

<html lang="{{ session()->get('locale') ?? app()->getLocale() }}" class="{{ $configData['style'] }}-style {{ $navbarFixed ?? '' }} {{ $menuFixed ?? '' }} {{ $menuCollapsed ?? '' }} {{ $footerFixed ?? '' }} {{ $customizerHidden ?? '' }}" dir="{{ $configData['textDirection'] }}" data-theme="{{ (($configData['theme'] === 'theme-semi-dark') ? (($configData['layout'] !== 'horizontal') ? $configData['theme'] : 'theme-default') :  $configData['theme']) }}" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="{{ $configData['layout'] . '-menu-' . $configData['theme'] . '-' . $configData['style'] }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') |
    {{ config('variables.templateName') ? config('variables.templateName') : 'TemplateName' }} -
    {{ config('variables.templateSuffix') ? config('variables.templateSuffix') : 'TemplateSuffix' }}</title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
  <link rel="stylesheet" href="{{ asset('plugins/css/select2.min.css') }}">
  @livewireStyles
  <!-- Include Styles -->
  @include('layouts/sections/styles')

  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('layouts/sections/scriptsIncludes')
</head>

<body>
  <!-- Layout Content -->
  @yield('layoutContent')
  <!--/ Layout Content -->
  <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>
  @livewireScripts

  <!-- Sweetalert2 for alerts more nice -->
  <script src="{{ asset('plugins/sweetalert2@11.js') }}"></script>
  <!-- Load plugins -->
  <script src="{{ asset('plugins/select2.min.js') }}"></script>
  <script src="{{ asset('plugins/patternomaly.js') }}"></script>
  <script src="{{ asset('plugins/chart.min.js') }}"></script>
  <script src="{{ asset('plugins/parsley.min.js') }}"></script>
  <script language="JavaScript">
      $(document).ready(() => {
          $('.select2').select2();
      });
      history.forward();
  </script>
  @include('layouts/sections/scripts')
  @yield('js')

</body>

</html>
