{{-- นี่คือหน้า game/g_4/index.blade.php --}}
@extends('layouts.game.bullying.index')

@section('content')
    <!-- Introduction Modal (shows first) - แสดงตาม parameter -->
    @if(isset($showIntroModal) && $showIntroModal)
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 4</h3>
            <p class="text-lg text-indigo-800 mb-2">จับคู่รูปภาพกับข้อความที่เกี่ยวกับการรังแกทางไซเบอร์</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>
    @endif

    <div class="card-container space-y-6 px-6 md:px-0 {{ isset($showIntroModal) && $showIntroModal ? 'game-blur' : '' }}" id="game-content">
        <div class="text-center">
            <h2 class="text-xl font-bold text-indigo-800 ">จับคู่รูปภาพกับข้อความที่เกี่ยวกับการรังแกทางไซเบอร์</h2>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- แถวที่ 1 -->
            <div class="grid grid-cols-2 gap-10 mb-8">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="1">
                    การปะทะคารม
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="1">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/groom.png') }}" alt="การกล่อมหม" class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">การกล่อมหม</div>
                    </div>
                </div>
            </div>

            <!-- แถวที่ 2 -->
            <div class="grid grid-cols-2 gap-10 mb-8">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="2">
                    การก่อกวน
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="2">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/cover.png') }}" alt="การปกปิดการณม"
                                class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">การปกปิดการณม</div>
                    </div>
                </div>
            </div>

            <!-- แถวที่ 3 -->
            <div class="grid grid-cols-2 gap-10 mb-8">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="3">
                    การใส่ร้ายป้ายสี
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="3">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/exclude.png') }}" alt="รวมรอบ เป็นคนซัน"
                                class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">รวมรอบ เป็นคนซัน</div>
                    </div>
                </div>
            </div>

            <!-- แถวที่ 4 -->
            <div class="grid grid-cols-2 gap-10 mb-8">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="4">
                    สวมรอยเป็นคนอื่น
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="4">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/defame.png') }}" alt="การใส่ร้าย ป้ายสี"
                                class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">การใส่ร้าย ป้ายสี</div>
                    </div>
                </div>
            </div>

            <!-- แถวที่ 5 (แสดงตาม parameter) -->
            @if(isset($showFifthPair) && $showFifthPair)
            <div class="grid grid-cols-2 gap-10 mb-6">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="5">
                    การข่มเหงทางออนไลน์
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="5">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/cyberbully.png') }}" alt="การข่มเหงทางออนไลน์"
                                class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">การข่มเหงทางออนไลน์</div>
                    </div>
                </div>
            </div>
            @else
            <div class="mb-6"></div>
            @endif

            <div class="progress-container pl-2 pr-2 mt-8 mb-2">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div id="progress-bar"
                        class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2 rounded-full transition-all duration-500 ease-out"
                        style="width: 0%"></div>
                </div>
                <div class="flex justify-between items-center mt-2 pl-2 pr-2">
                    <span class="text-center text-gray-600 text-sm block">ความคืบหน้า</span>
                    <span id="progress-percentage" class="text-gray-600 text-sm">0%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Completion Modal -->
    <div id="complete-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="Character" class="w-32 h-auto mx-auto mb-4">
                <h3 class="text-xl font-bold text-indigo-800 mb-2">เยี่ยมมาก!</h3>
                <p class="text-indigo-800">คุณตอบได้ถูกต้อง</p>
                <p class="text-indigo-800">เริ่มความท้าทายในเกมต่อไปกัน</p>
            </div>
            <button id="finish-game-btn"
                class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                เริ่ม
            </button>
        </div>
    </div>

    @include('layouts.game.script.4.index')

    {{-- กำหนดค่า JavaScript Variables - แก้ไขแล้ว --}}
    @php
        $defaultPairs = 4;
        $defaultMatches = ['1' => '2', '2' => '1', '3' => '4', '4' => '3'];
        $defaultNextRoute = route('main');
        $defaultShowIntroModal = false;
    @endphp
    
    <script>
        // กำหนดค่าจาก Controller
        window.gamePairs = @json($totalPairs ?? $defaultPairs);
        window.gameMatches = @json($correctMatches ?? $defaultMatches);
        window.gameNextRoute = @json($nextRoute ?? $defaultNextRoute);
        window.gameHasIntroModal = @json($showIntroModal ?? $defaultShowIntroModal); // ★ เพิ่มตัวแปรนี้ ★
    </script>
@endsection