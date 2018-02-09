<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include jQuery Mobile stylesheets -->
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.mobile-1.4.5.min.css') }}">
    @stack('links')

</head>
<body id="mobile-layout">
@yield('content')

<!-- JavaScripts -->
<!-- Include the jQuery library -->
<script src="{{URL::asset('js/jquery-2.1.0.min.js')}}"></script>
<!-- Include the jQuery Mobile library -->
<script src="{{URL::asset('js/jquery.mobile-1.4.5.min.js')}}"></script>
@stack('scripts')
</body>
</html>
