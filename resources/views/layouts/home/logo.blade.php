<div class="flex flex-col items-center justify-between min-h-screen">
    <div class="text-center mt-16">
        <div class="mx-auto">
            <!-- ทำให้ logo เป็นลิงก์ไปยังหน้า home -->
            <a href="{{ route('home') }}" class="inline-block w-full max-w-[250px] mx-auto">
                <img src="{{ asset('images/logo.png') }}" alt="Anti-Cyberbullying Logo" class="w-full h-auto hover:opacity-80 transition-opacity">
            </a>
        </div>
    </div>

    @yield('content')
</div>