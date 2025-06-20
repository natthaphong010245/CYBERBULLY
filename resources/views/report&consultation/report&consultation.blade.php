@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-8 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">รายงาน ขอคำปรึกษา</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">หมวดหมู่</p>
                </div>
            </div>
        </div>

        <!-- Video Cards -->
        <a href="{{ route('safe_area') }}" class="block relative mt-8">
            <div class="flex items-center h-20 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-4 -top-6 z-10">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="font-medium text-white text-xl">พื้นที่ปลอดภัย</div>
                </div>
            </div>
        </a>

        <a href="{{ route('behavioral_report') }}" class="block relative mt-8">
            <div class="flex items-center h-20 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-4 -top-6 z-10">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="font-medium text-white text-xl">รายงานพฤติกรรม</div>
                </div>
            </div>
        </a>
        
        <a href="{{ route('request_consultation') }}" class="block relative mt-8">
            <div class="flex items-center h-20 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-4 -top-6 z-10">
                    <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="font-medium text-white text-xl">ขอรับการปรึกษา</div>
                </div>
            </div>
        </a>
    </div>
@endsection