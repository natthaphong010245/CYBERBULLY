{{-- นี่คือหน้า game/g_11/index.blade.php --}}
@extends('layouts.game.dealing_bullying.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">การรับมือการกลั่นแกล้งบนโลกออนไลน์</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 11</h3>
            <p class="text-lg text-indigo-800 mb-4">สัญญาณเตือนภัยกับการรังแกทางไซเบอร์</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Main Game Screen -->
    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center">
            <h2 class="text-xl font-bold text-indigo-800">น้องๆ คิดว่าการ CYBERBULLYING ผิดกฎหมายหรือไม่</h2>
        </div>

        <div class="flex items-center text-gray-500 text-sm mb-4">
            <div class="flex-1 border-b border-gray-200"></div>
            <span class="px-4">เลือกเหตุการณ์ เพื่ออ่านข้อมูลเพิ่มเติม</span>
            <div class="flex-1 border-b border-gray-200"></div>
        </div>

        <!-- Warning Signal Options (Top Section) -->
        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="card-hover bg-white border-2 border-gray-300 rounded-2xl p-2 text-center"
                onclick="showSignalDetails(1)">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/game/warning_signal.png') }}" alt="สัญญาณเตือน"
                        class="w-16 h-16 object-contain pulse-animation">
                </div>
                <div class="text-indigo-800 font-bold text-lg">สัญญาณเตือน</div>
                <div class="text-indigo-800 text-2xl font-bold">1</div>
            </div>

            <div class="card-hover bg-white border-2 border-gray-300 rounded-2xl p-2 text-center"
                onclick="showSignalDetails(2)">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/game/warning_signal.png') }}" alt="สัญญาณเตือน"
                        class="w-16 h-16 object-contain pulse-animation">
                </div>
                <div class="text-indigo-800 font-bold text-lg">สัญญาณเตือน</div>
                <div class="text-indigo-800 text-2xl font-bold">2</div>
            </div>
        </div>

        <!-- Answer Choices (Bottom Section) -->
        <div class="flex items-center text-gray-500 text-sm mb-2 mt-8">
            <div class="flex-1 border-b border-gray-200"></div>
            <span class="px-4">ตัวเลือก</span>
            <div class="flex-1 border-b border-gray-200"></div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <button class="bg-indigo-800 text-white rounded-xl py-6 text-lg card-hover" onclick="selectAnswer(1)">
                สัญญาณเตือน<br>
                <h class="text-3xl font-bold">1</h>
            </button>
            <button class="bg-indigo-800 text-white rounded-xl py-6 text-lg card-hover" onclick="selectAnswer(2)">
                สัญญาณเตือน<br>
                <h class="text-3xl font-bold">2</h>
            </button>
        </div>
    </div>

    <!-- Signal Details Modal -->
    <div id="signal-modal"
        class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden items-center justify-center z-50">
        <div class="modal-content bg-white rounded-3xl shadow-2xl p-8 max-w-sm mx-4 text-center">
            <h2 class="text-xl font-bold text-indigo-800 mb-4">
                สัญญาณเตือนภัยกับงบนอกถังผู้ถูกกลั่นแกล้งทางไซเบอร์
            </h2>

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/game/warning_signal.png') }}" alt="สัญญาณเตือน"
                    class="w-20 h-20 object-contain pulse-animation">
            </div>
            <div class="text-indigo-800 font-bold text-xl mb-4 text-center">
                <div class="flex items-center mb-2">
                    <div class="flex-1 border-b-2 border-indigo-700"></div>
                    <span class="px-4">สัญญาณเตือน</span>
                    <div class="flex-1 border-b-2 border-indigo-700"></div>
                </div>
                <div class="text-2xl" id="signal-number">1</div>
            </div>

            <div id="signal-content" class="text-indigo-800 text-sm mb-6 leading-relaxed text-left">
                <!-- Content will be inserted here -->
            </div>

            <button onclick="closeSignalModal()"
                class="bg-[#929AFF] text-white px-8 py-2 rounded-xl font-medium hover:bg-purple-600 transition-colors">
                ปิด
            </button>
        </div>
    </div>

    <!-- Success Modal (เยี่ยมมาก!) -->
    <div id="success-modal"
        class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden items-center justify-center z-50">
        <div class="modal-content bg-white rounded-3xl shadow-2xl p-8 max-w-sm mx-4 text-center">
            <h2 class="text-xl font-bold text-indigo-800 mb-4">
                สัญญาณเตือนภัยกับงบนอกถังผู้ถูกกลั่นแกล้งทางไซเบอร์
            </h2>

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="Character"
                    class="w-24 h-24 object-contain rounded-full">
            </div>

            <div class="text-2xl font-bold text-indigo-800">เยี่ยมมาก!</div>
            <div class="text-indigo-800 mb-4">คุณตอบได้ถูกต้อง</div>
            <div class="text-indigo-800 text-lg font-bold mb-2">เริ่มความท้าทายเกมต่อไปกัน</div>

            <button onclick="goToMain()" class="bg-[#929AFF] text-white px-8 py-2 rounded-xl font-medium transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Retry Modal (ลองอีกครั้ง!) -->
    <div id="retry-modal"
        class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden items-center justify-center z-50">
        <div class="modal-content bg-white rounded-3xl shadow-2xl p-8 max-w-sm mx-4 text-center">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="Character"
                    class="w-24 h-24 object-contain rounded-full">
            </div>

            <div class="text-2xl font-bold text-indigo-800 mb-2">ลองอีกครั้ง!</div>
            <div class="text-indigo-800 mb-4">คำตอบของคุณยังไม่ถูกต้อง</div>

            <div class="rounded-xl p-4 mb-6 text-left">
                <div class="text-indigo-800 font-bold mb-2 text-center">
                    สัญญาณเตือนภัยกับงบนอกถังผู้ถูกกลั่น<br>
                    แกล้งทางไซเบอร์
                </div>
                <div class="text-indigo-800 text-lg font-bold mb-2 text-center">
                    <div class="flex items-center mb-2">
                        <div class="flex-1 border-b-2 border-indigo-700"></div>
                        <span class="px-4">สัญญาณเตือน</span>
                        <div class="flex-1 border-b-2 border-indigo-700"></div>
                    </div>
                    <div class="text-xl">1</div>
                </div>
                <div class="text-indigo-800 text-sm leading-relaxed">
                    หลีกเลี่ยงการถ่ายภาพคนโดยไม่คูลใจรองเรียน
                    เก็บตัวโดยอาคิสจังหบใครมีบุนของตัดตัว เองไว
                    แล้วยิ่น เช่น ตั้งฉายและ ไม่มีการกู
                </div>
            </div>

            <div class="text-indigo-800 text-lg font-bold mb-2">เริ่มความท้าทายเกมต่อไปให้กันเลย</div>

            <button onclick="goToMain()"
                class="bg-[#929AFF] text-white px-8 py-2 rounded-xl font-medium transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

        @include('layouts.game.script.11.index')

@endsection
