<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('admin.layouts.head')
<body class="loading" data-layout-config='{"leftSideBarTheme":"dark", "darkMode":false}'>
<div class="wrapper">
    @include('admin.layouts.sidebar')
    <div class="content-page">
        <div class="content">
            @include('admin.layouts.header')
            @yield('content')
        </div>
        @include('admin.layouts.footer')
    </div>
</div>
@include('admin.layouts.scripts')
</body>
</html>
