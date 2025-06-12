{{-- นี่คือหน้า game/g_6/index.blade.php --}}
@extends('layouts.game.bullying.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 6</h3>
            <p class="text-lg text-indigo-800 mb-4">พบปัญหา สิ่งที่เขาได้ยินได้ทุกข์ทรมาน
                หรือกลั่นแกล้งบนโลกออนไลน์ที่ผ่านมาได้เลย</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="bg-white min-h-0" id="game-content"> <!-- เปลี่ยนจาก min-h-screen เป็น min-h-0 -->
        <div class="card-container space-y-2 px-4 py-2 pb-4"> <!-- เพิ่ม pb-4 เพื่อควบคุม bottom padding -->
            <!-- Header -->
            <div class="text-center mb-6"> <!-- ลดจาก mb-8 เป็น mb-6 -->
                <h2 class="text-xl sm:text-xl font-bold text-indigo-800 leading-tight px-4">
                    พบปัญหา สิ่งที่เขาได้ยินได้ทุกข์ทรมาน หรือกลั่นแกล้งบนโลกออนไลน์ที่ผ่านมาได้เลย
                </h2>
            </div>

            <!-- Main Content Area -->
            <div class="flex flex-col items-center space-y-2">
                <!-- Circular Message Display Area -->
                <div class="relative w-80 h-80 sm:w-96 sm:h-96">
                    <!-- Center Image (ลบกรอบวงกลมออกแล้ว) -->
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/game/6/stop_cyberbullying.png') }}" alt="Character"
                                class="w-28 h-28 sm:w-20 sm:h-20 object-contain">
                        </div>
                    </div>

                    <!-- Messages Container -->
                    <div id="messages-container" class="absolute inset-0">
                        <!-- Messages will be dynamically positioned here -->
                    </div>
                </div>

                <!-- Input Section -->
                <div class="w-full max-w-lg mr-4 ml-4 mt-8">
                    <div class="relative flex items-center border-2 border-gray-300 rounded-2xl p-2 mb-3">
                        <!-- ลดจาก mb-4 เป็น mb-3 -->
                        <input type="text" id="message-input" placeholder="CYBERBULLYING"
                            class="flex-1 px-6 py-2 bg-transparent outline-none focus:outline-none text-gray-700 placeholder-gray-400 text-lg"
                            maxlength="20">
                        <button id="add-message-btn" class="bg-[#5F58C9] text-white p-3 rounded-full transition-colors  ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                        </button>
                    </div>

                    <!-- Next Button - Right aligned -->
                    <div class="flex justify-end mt-8 mr-2">
                        <button id="next-btn"
                            class="bg-[#929AFF] text-white font-medium py-3 px-8 rounded-2xl transition-colors hover:bg-[#7B85FF] disabled:bg-gray-300 disabled:cursor-not-allowed shadow-lg"
                            disabled>
                            ถัดไป
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.game.script.6.index')
@endsection
