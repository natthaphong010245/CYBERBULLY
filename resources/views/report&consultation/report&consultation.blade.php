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
            <div class="flex items-center h-24 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-6 -top-8 z-10">
                    <img src="{{ asset('images/report_consultation/safe_area.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="font-medium text-white text-xl">พื้นที่ปลอดภัย</div>
                </div>
            </div>
        </a>

        <br>
        <a href="{{ route('behavioral_report') }}" class="block relative mt-8">
            <div class="flex items-center h-24 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-6 -top-8 z-10">
                    <img src="{{ asset('images/report_consultation/behavioral_report.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="font-medium text-white text-xl">รายงานพฤติกรรม</div>
                </div>
            </div>
        </a>
        
        <br>
        <a href="{{ route('request_consultation') }}" class="block relative mt-8">
            <div class="flex items-center h-24 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-6 -top-8 z-10">
                    <img src="{{ asset('images/report_consultation/request_advice.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="font-medium text-white text-xl">ขอรับการปรึกษา</div>
                </div>
            </div>
        </a>
    </div>
@endsection