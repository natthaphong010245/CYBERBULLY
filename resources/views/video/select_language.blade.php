@extends('layouts.main_category')

@section('content')
    <div class="card-container space-y-6 px-2 sm:px-4 md:px-0">
        <div class="text-center mb-8 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">VIDEO</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">ภาษา</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 w-full max-w-sm md:max-w-xl mx-auto">
            @foreach($languages as $langId => $langName)
                @php
                    $isBlue = in_array($langId, [1, 3, 5, 7]); // ภาษาไทย, ลาหู่, เย้า, ลีซู
                    $bgColor = $isBlue ? 'bg-gradient-to-r from-blue-400 to-blue-500' : 'bg-gradient-to-r from-purple-300 to-purple-400';
                @endphp

                <a href="{{ route("main_video_language{$langId}") }}"
                   class="block w-full transform transition-transform hover:scale-105">
                    <div class="py-4 px-6 flex items-center justify-center h-16 rounded-2xl {{ $bgColor }} shadow-md hover:shadow-lg transition-all">
                        <div class="font-medium text-white text-xl">{{ $langName }}</div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
@endsection
