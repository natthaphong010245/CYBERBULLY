@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-4 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">ขอรับการปรึกษา</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">ประเภท</p>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <a href="{{ route('cyberbullying') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-24 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">คำปรึกษาจาก</div>
                    <div class="font-median text-white text-2xl">นักวิจัย</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/report_consultation/researcher.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
            </div>
        </a>
        
        <a href="{{ route('teacher_report') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-24 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">คำปรึกษาจาก</div>
                    <div class="font-median text-white text-2xl">คุณครู</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/report_consultation/teacher.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
            </div>
        </a>

        <a href="{{ route('province_report') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-24 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">คำปรึกษาจากหน่วยงาน</div>
                    <div class="font-median text-white text-2xl">จังหวัดเชียงราย</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/report_consultation/province.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
            </div>
        </a>

        <a href="{{ route('country_report') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-24 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">คำปรึกษาจากหน่วยงาน</div>
                    <div class="font-median text-white text-2xl">ประเทศไทย</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/report_consultation/country.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
            </div>
        </a>

        <a href="{{ route('app_center_report') }}" class="block relative">
            <div class="py-3 px-6 flex items-center justify-between h-24 rounded-[10px]"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="flex flex-col">
                    <div class="font-median text-white text-lg">APPLICATION</div>
                    <div class="font-median text-white text-2xl">พัฒนาจากศูนย์</div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/report_consultation/application.png') }}" alt="Teen Icon" class="w-20 h-20 object-contain">
                </div>
            </div>
        </a>
    </div>
@endsection