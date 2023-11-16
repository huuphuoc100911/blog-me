@include('manager.layouts.header')
@include('manager.layouts.navbar')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        @include('manager.layouts.topbar')
        @yield('content')
    </div>
@include('manager.layouts.footer')
