<!DOCTYPE html>
<html lang="th">

@include('layouts.head')

<body class="relative">
    @include('layouts.nav.sub')
    @include('layouts.logo')
    @yield('content')
    @yield('scripts')
</body>

</html>
