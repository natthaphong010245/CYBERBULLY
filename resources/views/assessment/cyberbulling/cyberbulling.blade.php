@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-4 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">CYBERBULLYING</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">แบบคัดกรอง</p>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <a href="{{ route('person_action') }}" class="block relative">
            <div class="py-3 pl-20 pr-6 flex items-center h-20 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-2 -top-6">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
                </div>
                <div class="flex flex-col ml-12">
                    <div class="font-median text-white text-lg">CYBERBULLYING</div>
                    <div class="font-bold text-white text-xl">การกระทำ</div>
                </div>
            </div>
        </a>

        <a href="{{ route('victim') }}" class="block relative">
            <div class="py-3 pl-20 pr-6 flex items-center h-20 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-2 -top-6">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
                </div>
                <div class="flex flex-col ml-12">
                    <div class="font-median text-white text-lg">CYBERBULLYING</div>
                    <div class="font-bold text-white text-xl">ผู้ถูกกระทำ</div>
                </div>
            </div>
        </a>

        <a href="{{ route('overview') }}" class="block relative">
            <div class="py-3 pl-20 pr-6 flex items-center h-20 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-2 -top-6">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
                </div>
                <div class="flex flex-col ml-12">
                    <div class="font-median text-white text-lg">CYBERBULLYING</div>
                    <div class="font-bold text-white text-xl">ภาพรวม</div>
                </div>
            </div>
        </a>
    </div>
@endsection