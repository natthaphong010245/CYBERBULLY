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
        <button onclick="window.location.href='{{ route('safe_area/voice') }}'" class="bg-[#929AFF] w-full py-2 rounded-2xl text-white flex items-center justify-center space-x-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" 
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
            </svg>
            <div class="text-left">
                <div class="font-semibold text-xl">แชร์ประสบการณ์ด้วย</div>
                <div class="text-base">เสียง</div>
            </div>
        </button>
        
        <button onclick="window.location.href='{{ route('safe_area/message') }}'" class="bg-[#929AFF] w-full py-2 rounded-2xl text-white flex items-center justify-center space-x-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            <div class="text-left">
                <div class="font-semibold text-xl">แชร์ประสบการณ์ด้วย</div>
                <div class="text-base">ข้อความ</div>
            </div>
        </button>
    </div>
</div>
@endsection