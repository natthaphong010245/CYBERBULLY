@extends('layouts.inforgraphic.index')

@section('title', $item ? $item['title'] : 'ไม่พบข้อมูล')

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-8">
        @if ($item)
            <!-- Content Image - Fixed size container -->
            <div class="w-full flex justify-center mb-8">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-auto max-w-lg rounded-lg">
            </div>
            
            <!-- Content -->
            <div class="prose max-w-none mb-8">
                <h2 class="text-xl font-bold text-indigo-800 mb-4">{{ $item['title'] }}</h2>
                <div>
                    {!! $item['content'] !!}
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex justify-between space-x-4 mt-8 mb-10">
                @if ($prevItem)
                    <a href="{{ route('inforgraphic.detail', ['id' => $prevItem['id']]) }}" class="flex-1 bg-purple-200 text-purple-800 py-3 px-6 rounded-full text-center font-medium">
                        ก่อนหน้า
                    </a>
                @else
                    <div class="flex-1 bg-gray-200 text-gray-400 py-3 px-6 rounded-full text-center font-medium cursor-not-allowed">
                        ก่อนหน้า
                    </div>
                @endif
                
                @if ($nextItem)
                    <a href="{{ route('inforgraphic.detail', ['id' => $nextItem['id']]) }}" class="flex-1 bg-purple-600 text-white py-3 px-6 rounded-full text-center font-medium">
                        ถัดไป
                    </a>
                @else
                    <div class="flex-1 bg-gray-200 text-gray-400 py-3 px-6 rounded-full text-center font-medium cursor-not-allowed">
                        ถัดไป
                    </div>
                @endif
            </div>
        @else
            <div class="text-center py-10">
                <h2 class="text-2xl font-bold text-red-600 mb-4">ไม่พบข้อมูล</h2>
                <p class="text-gray-600">ไม่พบข้อมูล Infographic ที่คุณต้องการ</p>
                <a href="{{ route('inforgraphic.main') }}" class="mt-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg">กลับไปหน้าหลัก</a>
            </div>
        @endif
    </div>
@endsection