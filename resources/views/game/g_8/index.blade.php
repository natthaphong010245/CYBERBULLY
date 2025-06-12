{{-- นี่คือหน้า game/g_8/index.blade.php --}}
@extends('layouts.game.causes_bullying.index')

@section('content')
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">สาเหตุของการกลั่นแกล้งบนโลกออนไลน์</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 8</h3>
            <p class="text-lg text-indigo-800 mb-4">ผลกระทบของผู้รังแกกันทาง ไซเบอร์ จะเป็นอย่างไรบ้าง</p>
            <p class="text-sm text-indigo-600 mb-4">เลือกรูปให้ตรงกับคำถาม</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-8">
            <h2 class="text-xl font-bold text-indigo-800">น้อง ๆ คิดว่า ผลกระทบของผู้รังแกกันทาง ไซเบอร์ จะเป็นอย่างไรบ้าง</h2>
            <p class="text-lg text-indigo-700 mt-2">เลือกรูปให้ตรงกับคำถาม</p>
        </div>
        
        <!-- Choice Cards -->
        <div class="space-y-4">
            <!-- Correct Choice (Top) -->
            <div class="choice-card correct-choice bg-white rounded-xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 mr-2 ml-2 mb-12" style="box-shadow: 0 0 15px rgba(0,0,0,0.1);">
                <div class="flex justify-center">
                    <img src="{{ asset('images/game/8/true.png') }}" alt="Emotional Impact" class="w-80 h-48 object-contain">
                </div>
            </div>
            
            <!-- Wrong Choice (Bottom) -->
            <div class="choice-card wrong-choice bg-white rounded-xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 mr-2 ml-2" style="box-shadow: 0 0 15px rgba(0,0,0,0.1);">
                <div class="flex justify-center">
                    <img src="{{ asset('images/game/8/false.png') }}" alt="Work Impact" class="w-80 h-48 object-contain">
                </div>
            </div>
        </div>
    </div>

    <!-- Correct Answer Modal -->
    <div id="correct-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-bold text-indigo-800 mb-4">ผลกระทบของผู้ถูกรังแกทางไซเบอร์</h3>
                
                <!-- Character Image -->
                <div class="mb-4">
                    <img src="{{ asset('images/game/8/true.png') }}" alt="Character with emotions" class="w-40 h-32 mx-auto">
                </div>
                
                <!-- Answer List -->
                <div class="text-left space-y-2 mb-6 ml-2 mr-2">
                    <p class="text-indigo-800"><span class="font-bold">1.</span> เคยชินกับการละเมิดกฎ มีพฤติกรรมต่อต้านสังคม โตขึ้นจะเสี่ยงต่อการเป็นอันธพานนำไปสู่กระบวนการทางกฎหมาย</p>
                    <p class="text-indigo-800"><span class="font-bold">2.</span> ความรุนแรงไปใช้ในครอบครัว กลายเป็นวัฏจักรส่งผลถึงลูกหลานให้เคยชินกับการใช้ความรุนแรง</p>
                    <p class="text-indigo-800"><span class="font-bold">3.</span> ออกจากการศึกษาก่อนจบ และมีแนวโน้มที่จะตกงานอีก</p>
                    <p class="text-indigo-800"><span class="font-bold">4.</span> แนวโน้มการการใช้สารเสพติดต่างๆ</p>
                </div>
            </div>
            <button id="finish-correct-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                ถัดไป
            </button>
        </div>
    </div>

    <!-- Wrong Answer Modal -->
    <div id="wrong-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4" >
                    <img src="{{ asset('images/material/incorrect.png') }}" alt="Wrong" class="w-20 h-20">
                </div>
                <h3 class="text-lg font-bold text-indigo-800 mb-2">ตัวเลือกของคุณยังไม่ถูก</h3>
                <p class="text-indigo-800">ไปดูคำตอบที่ถูกกัน</p>
            </div>
            <button id="show-answer-btn" class="text-white font-medium py-2 px-6 rounded-lg transition-colors" style="background-color: #DD2F2F;" onmouseover="this.style.backgroundColor='#B82626'" onmouseout="this.style.backgroundColor='#DD2F2F'">
                ดูคำตอบ
            </button>
        </div>
    </div>

    {{-- Include shared script --}}
    @include('layouts.game.script.8_9_10.index')

    {{-- กำหนดค่า JavaScript Variables สำหรับเกม 8 --}}
    <script>
        // กำหนด route สำหรับเกม 8
        window.gameNextRoute = "{{ route('game_9') }}";
    </script>
@endsection