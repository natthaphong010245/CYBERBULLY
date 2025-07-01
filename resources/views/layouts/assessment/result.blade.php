<!DOCTYPE html>
<html lang="th">

@include('layouts.head')

<body class="relative">
    <div class="mt-6">
    @include('layouts.logo')
    </div>
     @yield('content')
    @yield('scripts')
</body>

</html>