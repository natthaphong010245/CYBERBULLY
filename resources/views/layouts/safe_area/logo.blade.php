{{-- resources/views/layouts/safe_area/logo.blade.php --}}
<div class="flex flex-col items-center justify-between min-h-screen">
    <h1 class="text-2xl font-bold text-white inline-block"
        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3), 0px 4px 8px rgba(0, 0, 0, 0.2);">พื้นที่ปลอดภัย</h1>
    <div class="text-center mt-10">
        <div class="mx-auto">
            <img src="/images/logo.png" alt="Logo" class="mx-auto h-40 w-auto">
        </div>
    </div>

    @yield('content')
</div>
