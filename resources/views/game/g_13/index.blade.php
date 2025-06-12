{{-- นี่คือหน้า game/g_13/index.blade.php --}}
@extends('layouts.game.dealing_bullying.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">การรับมือการกลั่นแกล้งบนโลกออนไลน์</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 13</h3>
            <p class="text-lg text-indigo-800 mb-4">วิธีรับมือ CYBERBULLYING</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Main Game Screen -->
    <div class="bg-white min-h-screen" id="game-content">
        <div class="container mx-auto px-4 ">
            <div class="text-center mb-12 relative">
                <div class="flex items-center justify-center">
                    <div class="relative">
                        <h1 class="text-2xl font-bold text-[#3E36AE] inline-block"> CYBERBULLYING</h1>
                        <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">วิธีรับมือ</p>
                    </div>
                </div>
            </div>

            <!-- Action Cards Grid -->
            <div class="max-w-md mx-auto">
                <!-- Top Row -->
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div class="action-card" data-action="stop">
                        <div class="action-card-inner">
                            <img src="{{ asset('images/cyberbullying/stop.png') }}" alt="Stop" class="action-image">
                        </div>
                    </div>

                    <div class="action-card" data-action="remove">
                        <div class="action-card-inner">
                            <img src="{{ asset('images/cyberbullying/remove.png') }}" alt="Remove" class="action-image">
                        </div>
                    </div>
                </div>

                <!-- Middle Row -->
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div class="action-card" data-action="be-strong">
                        <div class="action-card-inner">
                            <img src="{{ asset('images/cyberbullying/be-strong.png') }}" alt="Be Strong"
                                class="action-image">
                        </div>
                    </div>

                    <div class="action-card" data-action="block">
                        <div class="action-card-inner">
                            <img src="{{ asset('images/cyberbullying/block.png') }}" alt="Block" class="action-image">
                        </div>
                    </div>
                </div>

                <!-- Bottom Center -->
                <div class="flex justify-center">
                    <div class="action-card" data-action="tell" style="width: calc(50% - 8px);">
                        <div class="action-card-inner">
                            <img src="{{ asset('images/cyberbullying/tell.png') }}" alt="Tell" class="action-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Detail Modal -->
    <div id="action-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="modal-icon-container mb-8">
                <img id="modal-action-image" src="" alt="" class="modal-action-icon">
            </div>

            <h3 id="modal-action-title" class="text-2xl font-bold text-indigo-800 mb-2 mt-4"></h3>

            <p id="modal-action-description" class="text-indigo-800 text-base leading-relaxed mb-6"></p>

            <button id="next-btn"
                class="bg-[#929AFF] text-white font-medium py-2 px-8 rounded-xl transition-colors hover:bg-[#7B85FF]">
                ถัดไป
            </button>
        </div>
    </div>

    <!-- Summary Modal -->
    <div id="summary-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800 mb-6">CYBERBULLYING วิธีรับมือ</h3>

            <!-- Summary List -->
            <div class="space-y-4 text-left mb-6">
                <div class="summary-item">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ asset('images/cyberbullying/stop.png') }}" alt="Stop" class="summary-icon">
                        <span class="text-lg font-bold text-red-500">STOP</span>
                    </div>
                    <p class="text-sm text-gray-600">ป้องกันไม่ตอบโต้ เพื่อไม่ให้เกิดการกระทำที่รุนแรงขึ้น</p>
                </div>

                <div class="summary-item">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ asset('images/cyberbullying/remove.png') }}" alt="Remove" class="summary-icon">
                        <span class="text-lg font-bold text-red-500">REMOVE</span>
                    </div>
                    <p class="text-sm text-gray-600">ลบทุกภาพ ข้อความ วิดีโอ ที่เป็นการกระทำไม่เหมาะสม</p>
                </div>

                <div class="summary-item">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ asset('images/cyberbullying/be-strong.png') }}" alt="Be Strong" class="summary-icon">
                        <span class="text-lg font-bold text-red-500">BE STRONG</span>
                    </div>
                    <p class="text-sm text-gray-600">เข้มแข็ง จิตใจ และไม่ให้ผลกระทบกับตัวเอง</p>
                </div>

                <div class="summary-item">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ asset('images/cyberbullying/block.png') }}" alt="Block" class="summary-icon">
                        <span class="text-lg font-bold text-red-500">BLOCK</span>
                    </div>
                    <p class="text-sm text-gray-600">บล็อกผู้ใช้งานที่มีพฤติกรรมไม่เหมาะสม</p>
                </div>

                <div class="summary-item">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ asset('images/cyberbullying/tell.png') }}" alt="Tell" class="summary-icon">
                        <span class="text-lg font-bold text-red-500">TELL</span>
                    </div>
                    <p class="text-sm text-gray-600">บอกผู้ปกครอง ครู หรือคนสนิทให้ทราบเพื่อขอความช่วยเหลือ</p>
                </div>
            </div>

            <p class="text-indigo-800 font-semibold text-lg mb-4">เริ่มความท้าทายกันเลย</p>

            <button id="start-main-btn"
                class="bg-[#929AFF] text-white font-medium py-2 px-8 rounded-xl transition-colors hover:bg-[#7B85FF]">
                เริ่ม
            </button>
        </div>
    </div>

    @include('layouts.game.script.13.index')
@endsection
