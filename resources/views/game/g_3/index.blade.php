@extends('layouts.game.bullying.index')

@section('content')
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 3</h3>
            <p class="text-lg text-indigo-800 mb-2">แบบไหนที่เรียกว่าเป็นการรังแกทางไซเบอร์</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-2">
            <h2 class="text-xl font-bold text-indigo-800">แบบไหนที่เรียกว่าเป็นการรังแกทางไซเบอร์</h2>
        </div>
        
        <div class="grid grid-cols-2 gap-4" id="card-grid">
            <div class="card-option" data-card="ant" data-correct="false">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/ant.png') }}" alt="ANT" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANT</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/incorrect.png') }}" alt="Incorrect" class="w-auto h-28">
                    </div>
                </div>
            </div>
            
            <div class="card-option" data-card="anyplace" data-correct="true">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/place_time.png') }}" alt="place&time" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANY PLACE ANY TIME</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-auto h-28">
                    </div>
                </div>
            </div>
            
            <div class="card-option" data-card="anonymous" data-correct="true">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/anonymous.png') }}" alt="Anonymous" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANONYMOUNS</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-auto h-28">
                    </div>
                </div>
            </div>
            
            <div class="card-option" data-card="animal" data-correct="false">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/animals.png') }}" alt="Animals" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANIMAL</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/incorrect.png') }}" alt="Incorrect" class="w-auto h-28">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="feedback-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full mx-4 ">
            <div id="info-content" class="text-center">
            </div>
            <div class="mt-6 text-center">
                <button id="continue-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors">
                    ถัดไป
                </button>
            </div>
        </div>
    </div>

       @include('layouts.game.script.3.index')
@endsection