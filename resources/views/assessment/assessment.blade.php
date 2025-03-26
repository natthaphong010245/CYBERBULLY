@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-4 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">แบบคัดกรอง</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">หมวดหมู่</p>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <a href="{{ route('cyberbulling') }}" class="block relative">
            <div class="py-3 pl-20 pr-6 flex items-center h-20 rounded-[10px] mb-10"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-2 -top-6">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
                </div>
                <div class="flex flex-col ml-12">
                    <div class="font-median text-white text-lg">แบบคัดกรอง</div>
                    <div class="font-bold text-white text-xl">CYBERBULLYING</div>
                </div>
            </div>
        </a>

        <a href="{{ route('mental_health') }}" class="block relative">
            <div class="py-3 pl-20 pr-6 flex items-center h-20 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-2 -top-6">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
                </div>
                <div class="flex flex-col ml-12">
                    <div class="font-median text-white text-lg">แบบคัดกรอง</div>
                    <div class="font-bold text-white text-xl">สุขภาพจิต</div>
                </div>
            </div>
        </a>
    </div>
@endsection