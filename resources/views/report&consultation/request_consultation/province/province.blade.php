@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-4 px-5 pb-6">
        <!-- Page Title -->
        <div class="text-center mb-10 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-2xl font-bold text-[#3E36AE] inline-block">ขอคำปรึกษาจากหน่วยงาน</h1>
                    <p class="text-sm text-[#3E36AE] absolute -bottom-5 right-0">จังหวัดเชียงราย</p>
                </div>
            </div>
        </div>

        <!-- Hospital Cards -->
        <div class="card bg-[#929AFF] rounded-xl p-3 relative">
            <div class="flex items-center">
                <div class="min-w-[60px] h-[60px] bg-white rounded-full flex items-center justify-center overflow-hidden mr-4">
                    <img src="{{ asset('images/logo-placeholder.png') }}" alt="โรงพยาบาล" class="w-10 h-10 object-contain">
                </div>
                <div class="flex-grow">
                    <div class="text-white font-medium text-base leading-tight mb-2">โรงพยาบาลศูนย์การแพทย์มหาวิทยาลัยแม่ฟ้าหลวง</div>
                    <a href="tel:053-914000" class="flex items-center text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        053-914000
                    </a>
                </div>
            </div>
            <div class="absolute bottom-3 right-3">
                <a href="https://maps.app.goo.gl/MbUz7Q34dZifHeFW7" target="_blank" class="text-[#3E36AE] text-sm inline-flex items-center">
                    แผนที่
                </a>
            </div>
        </div>

        <div class="card bg-[#929AFF] rounded-xl p-3 relative">
            <div class="flex items-center">
                <div class="min-w-[60px] h-[60px] bg-white rounded-full flex items-center justify-center overflow-hidden mr-4">
                    <img src="{{ asset('images/logo-placeholder.png') }}" alt="โรงพยาบาล" class="w-10 h-10 object-contain">
                </div>
                <div class="flex-grow">
                    <div class="text-white font-medium text-base leading-tight mb-2">โรงพยาบาลแม่จัน</div>
                    <a href="tel:053-771300" class="flex items-center text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        053-771300
                    </a>
                </div>
            </div>
            <div class="absolute bottom-3 right-3">
                <a href="https://maps.app.goo.gl/MbUz7Q34dZifHeFW7" target="_blank" class="text-[#3E36AE] text-sm inline-flex items-center">
                    แผนที่
                </a>
            </div>
        </div>

        <div class="card bg-[#929AFF] rounded-xl p-3 relative">
            <div class="flex items-center">
                <div class="min-w-[60px] h-[60px] bg-white rounded-full flex items-center justify-center overflow-hidden mr-4">
                    <img src="{{ asset('images/logo-placeholder.png') }}" alt="โรงพยาบาล" class="w-10 h-10 object-contain">
                </div>
                <div class="flex-grow">
                    <div class="text-white font-medium text-base leading-tight mb-2">โรงพยาบาลแม่สรวย</div>
                    <a href="tel:053-786017" class="flex items-center text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        053-786017
                    </a>
                </div>
            </div>
            <div class="absolute bottom-3 right-3">
                <a href="https://maps.app.goo.gl/MbUz7Q34dZifHeFW7" target="_blank" class="text-[#3E36AE] text-sm inline-flex items-center">
                    แผนที่
                </a>
            </div>
        </div>

        <div class="card bg-[#929AFF] rounded-xl p-3 relative">
            <div class="flex items-center">
                <div class="min-w-[60px] h-[60px] bg-white rounded-full flex items-center justify-center overflow-hidden mr-4">
                    <img src="{{ asset('images/logo-placeholder.png') }}" alt="โรงพยาบาล" class="w-10 h-10 object-contain">
                </div>
                <div class="flex-grow">
                    <div class="text-white font-medium text-base leading-tight mb-2">โรงพยาบาลแม่ฟ้าหลวง</div>
                    <a href="tel:053-730357" class="flex items-center text-white text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        053-730357-8
                    </a>
                </div>
            </div>
            <div class="absolute bottom-3 right-3">
                <a href="https://maps.app.goo.gl/MbUz7Q34dZifHeFW7" target="_blank" class="text-[#3E36AE] text-sm inline-flex items-center">
                    แผนที่
                </a>
            </div>
        </div>
    </div>
@endsection