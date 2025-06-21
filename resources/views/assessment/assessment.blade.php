@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-8 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">แบบคัดกรอง</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">หมวดหมู่</p>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <a href="{{ route('cyberbullying') }}" class="block relative">
            <div class="flex items-center h-24 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-2 -top-8 z-10">
                    <img src="{{ asset('images/assessment/cyberbullying.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="flex flex-col text-center">
                        <div class="font-medium text-white text-lg mb-1">แบบคัดกรอง</div>
                        <div class="font-medium text-white text-xl">CYBERBULLYING</div>
                    </div>
                </div>
            </div>
        </a>

        <div class="mb-6"></div>

        <a href="{{ route('mental_health') }}" class="block relative">
            <div class="flex items-center h-24 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-5 -top-8 z-10">
                    <img src="{{ asset('images/assessment/mental_health.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="flex flex-col text-center">
                        <div class="font-medium text-white text-lg mb-1">แบบคัดกรอง</div>
                        <div class="font-medium text-white text-xl">สุขภาพทางจิต</div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endsection