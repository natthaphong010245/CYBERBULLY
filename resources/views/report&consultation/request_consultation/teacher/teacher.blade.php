@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-4 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">ขอคำปรึกษาจากคุณครู</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">โรงเรียน</p>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <a href="{{ route('cyberbullying') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-20 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">โรงเรียน............</div>
                    <div class="font-median text-white text-xl">จังหวัดเชียงราย</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-16 h-16 object-contain">
                </div>
            </div>
        </a>
        
        <a href="{{ route('cyberbullying') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-20 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">โรงเรียน............</div>
                    <div class="font-median text-white text-xl">จังหวัดเชียงราย</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-16 h-16 object-contain">
                </div>
            </div>
        </a>

        <a href="{{ route('cyberbullying') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-20 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">โรงเรียน............</div>
                    <div class="font-median text-white text-xl">จังหวัดเชียงราย</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-16 h-16 object-contain">
                </div>
            </div>
        </a>

        
    </div>
@endsection