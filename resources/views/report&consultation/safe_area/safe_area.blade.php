@extends('layouts.safe_area.index')

@section('content')
<div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-16">
    <div class="text-center mb-10 relative">
        <div class="flex items-center justify-center">
            <div class="relative">
                <h1 class="text-2xl font-bold text-[#3E36AE] inline-block">แชร์ประสบการณ์</h1>
                <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">การถูกรังแก</p>
            </div>
        </div>
    </div>
    
    <div class="space-y-16 px-2 mt-8">
        <button onclick="window.location.href='{{ route('safe_area/voice') }}'" class="bg-[#929AFF] w-full h-24 py-2 rounded-2xl text-white flex items-center justify-center space-x-8">
            <img src="{{ asset('images/safe_area/microphone.png') }}" alt="Microphone Icon" class="h-20 w-auto object-contain">
            <div class="text-left">
                <div class="font-semibold text-lg">แชร์ประสบการณ์ด้วย</div>
                <div class="text-2xl font-bold ml-4">เสียง</div>
            </div>
        </button>
        
        <button onclick="window.location.href='{{ route('safe_area/message') }}'" class="bg-[#929AFF] w-full h-24 py-2 rounded-2xl text-white flex items-center justify-center space-x-8">
            <img src="{{ asset('images/safe_area/message.png') }}" alt="Message Icon" class="h-20 w-auto object-contain">
            <div class="text-left">
                <div class="font-semibold text-lg">แชร์ประสบการณ์ด้วย</div>
                <div class="text-2xl font-bold ml-4">ข้อความ</div>
            </div>
        </button>
    </div>
</div>
@endsection