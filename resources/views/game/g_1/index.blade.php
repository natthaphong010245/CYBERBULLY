@extends('layouts.game.bullying.index')

@section('next-route', $nextRoute)

@section('content')
    @if ($showIntroModal)
        <div id="intro-modal"
            class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
                <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
                <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                    class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 1</h3>
                <p class="text-lg text-indigo-800 mb-4 pr-2 pl-2">พฤติกรรมแบบนี้เป็นการรังแกรูปแบบไหนกัน</p>
                <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
                <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                    เริ่ม
                </button>
            </div>
        </div>
    @endif

    <div class="card-container space-y-6 px-6 md:px-0 mb-6" id="game-content">
        <div class="text-center mb-2">
            <h2 class="text-xl font-bold text-indigo-800 pr-4 pl-4">พฤติกรรมแบบนี้เป็นการรังแกรูปแบบไหนกัน</h2>
        </div>

        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-2xl shadow-lg">
                <div class="rounded-lg overflow-hidden">
                    <img src="{{ asset('images/game/1/' . $scenarioImage) }}" alt="{{ $altText }}"
                        class="w-full h-52 object-cover rounded-lg">
                </div>
            </div>
        </div>

        <div class="mb-2">
            <div class="flex items-center justify-center mb-4 mt-2">
                <div class="flex-1 h-px bg-gray-400 max-w-28"></div>
                <h3 class="text-center text-gray-500 text-lg mx-4">ตัวเลือก</h3>
                <div class="flex-1 h-px bg-gray-400 max-w-28"></div>
            </div>
            <div class="grid grid-cols-2 gap-3 max-w-xs mx-auto" id="answer-options">
                @foreach ($answerOptions as $option)
                    <div class="answer-option cursor-pointer" data-answer="{{ $option['value'] }}"
                        data-correct="{{ $option['correct'] ? 'true' : 'false' }}">
                        <div
                            class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                            <div class="text-lg">การรังแกทาง</div>
                            <div class="text-xl">{{ $option['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="success-modal"
        class="modal-backdrop fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl.png') }}" alt="Happy Student"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800">เยี่ยมมาก!</h3>
            <p class="text-lg text-indigo-800 mb-4">คำตอบของคุณถูกต้อง</p>
            <p class="text-indigo-800 text-xl font-bold mb-1">เริ่มความท้าทายในเกมถัดไปกันเลย</p>
            <button id="success-btn"
                class="bg-[#929AFF] text-white font-medium text-lg py-2 px-8 rounded-xl transition-colors hover:bg-indigo-600">
                เริ่ม
            </button>
        </div>
    </div>

    <div id="failure-modal"
        class="modal-backdrop fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl_false.png') }}" alt="School Girl Character"
                class="w-32 h-auto mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800">พยายามต่อไป!</h3>
            <p class="text-lg text-indigo-800 mb-4">คำตอบของคุณยังไม่ถูกต้อง</p>

            <div class="mb-4">
                <img src="{{ asset('images/game/1/' . $scenarioImage) }}" alt="{{ $altText }}"
                    class="w-full h-auto object-cover rounded mb-2">
                <p class="text-indigo-800 text-2xl">{{ $correctAnswerText }}</p>
            </div>

            <p class="text-indigo-800 font-bold text-xl mb-1">เริ่มความท้าทายในเกมถัดไปกันเลย</p>
            <button id="failure-btn"
                class="bg-[#929AFF] text-white font-medium text-lg py-2 px-8 rounded-xl transition-colors hover:bg-indigo-600">
                ถัดไป
            </button>
        </div>
    </div>

    @include('layouts.game.script.1.index')
@endsection
