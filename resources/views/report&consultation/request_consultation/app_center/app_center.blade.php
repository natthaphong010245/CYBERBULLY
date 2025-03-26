@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-4 px-5 pb-6">
        <!-- Page Title -->
        <div class="text-center mb-10 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-2xl font-bold text-[#3E36AE] inline-block tracking-wider">APPLICATION</h1>
                    <p class="text-sm text-[#3E36AE] absolute -bottom-5 right-0">พัฒนาจากศูนย์</p>
                </div>
            </div>
        </div>

        <!-- Application Cards -->
        <a href="https://punpun.example.com" class="block">
            <div class="bg-[#929AFF] rounded-xl py-5 px-10 relative flex items-center mb-8 mt-4">
                <div class="min-w-[50px] h-[50px] flex items-center justify-center overflow-hidden mr-6">
                    <img src="{{ asset('images/punpun-logo.png') }}" alt="Punpun" class="w-10 h-10 object-contain">
                </div>
                <div class="flex-grow">
                    <div class="text-white font-medium mb-1 text-xl">วัยรุ่นอารมณ์</div>
                    <div class="text-white text-xs">ดาวน์โหลด...</div>
                </div>
            </div>
        </a>

        <a href="https://puangun.example.com" class="block">
            <div class="bg-[#929AFF] rounded-xl py-5 px-10 relative flex items-center">
                <div class="min-w-[50px] h-[50px] flex items-center justify-center overflow-hidden mr-6">
                    <img src="{{ asset('images/puangun-logo.png') }}" alt="Puangun" class="w-10 h-10 object-contain">
                </div>
                <div class="flex-grow">
                    <div class="text-white font-medium mb-1 text-xl">เพื่อนกัน (Puangun)</div>
                    <div class="text-white text-xs">ดาวน์โหลด...</div>
                </div>
            </div>
        </a>
    </div>
@endsection