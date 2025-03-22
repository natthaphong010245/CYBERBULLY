@extends('layouts.inforgraphic.index')

@section('title', 'หมวดหมู่ Infographic')

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-8">
        <!-- Page Title -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold" style="color: rgba(62, 54, 174, 1)">INFOGRAPHIC</h1>
            <p class="text-sm" style="color: rgba(62, 54, 174, 0.8)">หมวดหมู่</p>
        </div>
        
        <!-- Card section - Always in a single column -->
        <div class="card-container space-y-10 px-5 md:px-0">
            @foreach ($categories as $category)
                <a href="{{ route('inforgraphic.category', ['categoryId' => $category['id']]) }}" class="block relative">
                    <div class="py-3 pl-24 pr-6 flex items-center h-20 rounded-[10px]" style="background-color: rgba(146, 154, 255, 1)">
                        <div class="absolute left-4 -top-6">
                            <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="w-24 h-24 object-contain">
                        </div>
                        <div class="font-medium text-white text-lg ml-12">{{ $category['name'] }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
