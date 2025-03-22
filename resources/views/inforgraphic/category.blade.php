@extends('layouts.inforgraphic.index')

@section('title', $categoryName)

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-8">
        <h2 class="text-2xl md:text-3xl font-bold text-indigo-800 text-center mb-8">{{ $categoryName }}</h2>
        
        <div class="w-full">
            <!-- Divider line above first item -->
            <div class="w-full border-t-[2px] border-[#bdc3ff]"></div>
            
            @foreach ($items as $item)
                <a href="{{ route('inforgraphic.detail', ['id' => $item['id']]) }}" class="block">
                    <div class="w-full border-b-[2px] border-[#bdc3ff] py-4 hover:bg-gray-50">
                        <div class="flex items-center">
                            <div class="w-24 h-24 flex-shrink-0">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="ml-4 flex-grow">
                                <h3 class="text-lg font-medium text-gray-900">{{ $item['title'] }}</h3>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection