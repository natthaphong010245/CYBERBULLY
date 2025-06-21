@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <div class="text-center mb-10 mt-2 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">GAME & SCENARIO</h1>
                </div>
            </div>
        </div>

        <a href="{{ route('game') }}" class="block relative">
            <div class="flex items-center h-24 rounded-2xl relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-10 -top-8 z-10">
                    <img src="{{ asset('images/game/game.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="flex flex-col text-center">
                        <div class="font-medium text-white text-2xl">GAME</div>
                    </div>
                </div>
            </div>
        </a>

        <br>
        <br>

        <a href="{{ route('mental_health') }}" class="block relative">
            <div class="flex items-center h-24 rounded-2xl relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-3 -top-8 z-10">
                    <img src="{{ asset('images/game/scenario.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="flex flex-col text-center">
                        <div class="font-medium text-white text-2xl ml-4">SCENARIO</div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endsection