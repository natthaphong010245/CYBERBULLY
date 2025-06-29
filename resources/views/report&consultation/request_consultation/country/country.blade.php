@extends('layouts.main_category.index')

@section('content')
<div class="card-container space-y-4 px-5 pb-6">
    <div class="text-center mb-10 relative">
        <div class="flex items-center justify-center">
            <div class="relative">
                <h1 class="text-2xl font-bold text-[#3E36AE] inline-block">ขอคำปรึกษาจากหน่วยงาน</h1>
                <p class="text-sm text-[#3E36AE] absolute -bottom-5 right-0">ประเทศไทย</p>
            </div>
        </div>
    </div>

    @php
    $consultations = [
        [
            'name' => 'Childline Thailand Foundation',
            'phone' => '1387',
            'image' => '1387.png',
            'link' => 'https://www.facebook.com/childlinethailand/',
            'image_size' => 'w-16 h-16'
        ],
        [
            'name' => 'LOVECARE',
            'phone' => null,
            'image' => 'lovecare.png',
            'link' => 'https://web.facebook.com/lovecarestation/',
            'image_size' => 'w-20 h-20'
        ],
        [
            'name' => 'สายด่วน 1212',
            'phone' => '1212',
            'image' => '1212.png',
            'link' => 'https://web.facebook.com/1212ETDA',
            'image_size' => 'w-20 h-20'
        ],
        [
            'name' => 'สายด่วนสุขภาพจิต 1323',
            'phone' => '1323',
            'image' => '1323.png',
            'link' => 'https://1323alltime.camri.go.th/',
            'image_size' => 'w-20 h-20'
        ]
    ];
    @endphp

    @foreach($consultations as $consultation)
    <div class="bg-[#929AFF] rounded-xl p-3 relative flex items-center">
        <div class="min-w-[80px] h-[80px] bg-white rounded-full flex items-center justify-center overflow-hidden mr-4">
            <img src="{{ asset('images/report_consultation/country/' . $consultation['image']) }}" 
                 alt="{{ $consultation['name'] }}" 
                 class="{{ $consultation['image_size'] }} object-contain">
        </div>
        
        <div class="flex-grow">
            <div class="text-white font-medium text-lg leading-tight">{{ $consultation['name'] }}</div>
            
            @if($consultation['phone'])
            <a href="tel:{{ $consultation['phone'] }}" class="flex items-center text-white text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                {{ $consultation['phone'] }}
            </a>
            @endif
        </div>
        
        <div class="absolute bottom-3 right-3">
            <a href="{{ $consultation['link'] }}" target="_blank" class="text-[#3E36AE] text-sm inline-flex items-center">
                เพิ่มเติม
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection