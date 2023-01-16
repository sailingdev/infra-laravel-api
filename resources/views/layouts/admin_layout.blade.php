<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    @include('common.header')
    @yield('custom_css')
</head>

<body class="dashboard">

@include('common.topbar')

@include('common.menubar')

@yield('page_content')

@include('common.footer')
@include('common.scripts')

<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>

@yield('custom_scripts')

</body>
</html>
