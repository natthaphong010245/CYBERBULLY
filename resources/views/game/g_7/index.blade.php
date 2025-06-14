@extends('layouts.game.causes_bullying.index')

@section('content')
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
        </div>
    </div>

    <div id="wrong-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            
            <h3 class="text-2xl font-bold text-indigo-800">ลองอีกครั้ง</h3>
            <p class="text-indigo-800 mb-6 text-lg">คุณตอบไม่ถูกต้อง</p>
            
            <div class="flex gap-6 justify-center">
                <button id="skip-btn" class="bg-gray-400 text-white font-medium py-2 px-6 rounded-xl transition-colors">
                    ข้าม
                </button>
                <button id="try-again-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors">
                    อีกครั้ง
                </button>
            </div>
        </div>
    </div>

    <div id="correct-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            
            <h3 class="text-2xl font-bold text-indigo-800">เยี่ยมมาก!</h3>
            <p class="text-indigo-800 mb-6 text-lg">คุณตอบได้ถูกต้อง</p>
            
            <div class="text-indigo-800 p-2">
                <p class="font-bold text-xl mb-2">การกลั่นแกล้งบนโลกออนไลน์ เกิดจากอะไร...</p>
                <p class="text-lg leading-relaxed text-lef mb-4" >
                    สาเหตุของการกลั่นแกล้งบนโลกออนไลน์ สามารถเกิดได้หลากหลาย แต่ส่วนมากเกิดขึ้นจากความเกลียดชังและจงใจที่จะล้อเลียน เพื่อทำให้เป้าหมายเกิดความอับอายบนโลกไซเบอร์ มีทั้งทำครั้งเดียวเพื่อความสะใจแล้วหายไปและการจงใจตามคุกคามเป็นระยะเวลานานๆ แบบล็อคเป้าหมายจนกว่าจะพอใจ
                </p>
            
            <p class="text-indigo-800 text-xl font-bold mb-2">เริ่มความคิดกายในเกมต่อไปกัน</p>
            
            <button id="finish-btn" class="bg-[#929AFF] text-white font-medium py-2 px-8 rounded-xl transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

    @include('layouts.game.script.7.index')

@endsection