{{-- นี่คือหน้า game/g_7/index.blade.php --}}
@extends('layouts.game.causes_bullying.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">สาเหตุของการกลั่นแกล้งบนโลกออนไลน์</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 7</h3>
            <p class="text-lg text-indigo-800 mb-4">อยากรู้ไหมว่า สาเหตุของการกลั่นแกล้งบนโลกออนไลน์ เกิดจากอะไร.....</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-8">
            <h2 class="text-xl font-bold text-indigo-800">อยากรู้ไหมว่า สาเหตุของการกลั่นแกล้ง บนโลกออนไลน์ เกิดจากอะไร...</h2>
        </div>
        
        <div class="relative min-h-96 flex items-center justify-center" id="mystery-container">
            <!-- Mystery boxes will be dynamically positioned here -->
        </div>
    </div>

    <!-- Wrong Answer Modal -->
    <div id="wrong-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-8 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-30 h-30 rounded-full flex items-center justify-center mx-auto mb-4" >
                    <img src="{{ asset('images/material/incorrect.png') }}" alt="Wrong" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-bold text-indigo-800 mb-2">ตัวเลือกของคุณยังไม่ถูกต้อง</h3>
                <p class="text-indigo-800">กรุณาลองอีกครั้ง</p>
            </div>
            <button id="try-again-btn" class="text-white font-medium py-2 px-6 rounded-lg transition-colors" style="background-color: #DD2F2F;" onmouseover="this.style.backgroundColor='#B82626'" onmouseout="this.style.backgroundColor='#DD2F2F'">
                อีกครั้ง
            </button>
        </div>
    </div>

    <!-- Correct Answer Modal -->
    <div id="correct-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4">
            <div class="text-center">
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-bold text-indigo-800 mb-4">การกลั่นแกล้งบนโลกออนไลน์มักเกิดจาก......</h3>
                <p class="text-indigo-800 mb-4 leading-relaxed text-justify" style="text-indent: 2rem;">
                    สาเหตุของการกลั่นแกล้งบนโลกออนไลน์ สามารถเกิดได้หลากหลาย แต่ส่วนมากเกิดขึ้นจากความเกลียดชังและจงใจที่จะล้อเลียน เพื่อทำให้เป้าหมายเกิดความอับอายบนโลกไซเบอร์ มีทั้งทำครั้งเดียวเพื่อความสะใจแล้วหายไปและการจงใจตามคุกคามเป็นระยะเวลานานๆ แบบล็อคเป้าหมายจนกว่าจะพอใจ
                </p>
                <div class="mb-6 mt-6">
                    <img src="{{ asset('images/game/7/stop_bully.png') }}" alt="Stop Cyberbullying" class="w-44 h-auto mx-auto">
                </div>
            </div>
            <div class="text-center">
                <button id="finish-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                    ถัดไป
                </button>
            </div>
        </div>
    </div>

        @include('layouts.game.script.7.index')

@endsection