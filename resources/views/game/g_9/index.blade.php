@extends('layouts.game.causes_bullying.index')

@section('content')
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">สาเหตุของการกลั่นแกล้งบนโลกออนไลน์</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 9</h3>
            <p class="text-lg text-indigo-800 mb-4">ผลกระทบของผู้ถูกรังแกทางไซเบอร์</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-indigo-800 mb-4">ผลกระทบของผู้ถูกรังแกทางไซเบอร์</h2>
            <p class="text-lg text-indigo-800 mt-2">เลือกรูปให้ตรงกับคำถาม</p>
        </div>
        
        <div class="space-y-4  mr-4 ml-4">
            <div class="choice-card wrong-choice bg-white rounded-xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 mr-2 ml-2 mb-12" style="box-shadow: 0 0 15px rgba(0,0,0,0.2);">
                <div class="flex justify-center">
                    <img src="{{ asset('images/game/9/true.png') }}" alt="Emotional Impact" class="w-80 h-48 object-contain">
                </div>
            </div>
            
            <div class="choice-card correct-choice bg-white rounded-xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 mr-2 ml-2 mb-12" style="box-shadow: 0 0 15px rgba(0,0,0,0.2);">
                <div class="flex justify-center">
                    <img src="{{ asset('images/game/9/false.png') }}" alt="Work Impact" class="w-80 h-48 object-contain">
                </div>
            </div>
        </div>
    </div>

    <div id="correct-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 text-center">
            <div class="mb-6">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                    class="w-24 h-auto rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-2xl font-bold text-indigo-800">เยี่ยมมาก!</h3>
                <p class="text-indigo-800 mb-6 text-lg">คำตอบของคุณถูกต้อง</p>
                <h3 class="text-xl font-bold text-indigo-800 mb-4">ผลกระทบของผู้ถูกรังแกมักทางไซเบอร์</h3>
                
                <div class="mb-4">
                    <img src="{{ asset('images/game/9/false.png') }}" alt="Character with emotions" class="w-40 h-32 mx-auto">
                </div>
                
                <div class="text-left space-y-2 mb-6 pr-4 pl-4">
                    <p class="text-indigo-800"><span class="font-bold">1.</span> ส่งผลต่อการเรียน เด็กขาดสมาธิในการ เรียนไม่อยากไปโรงเรียน</p>
                    <p class="text-indigo-800"><span class="font-bold">2.</span> เผชิญกับภาวะวิตกกังวล หวาดระแวงรู้ สึกไม่ปลอดภัย นอนไม่หลับ ภาวะซึมเศร้า และฆ่าตัวตาย</p>
                    <p class="text-indigo-800"><span class="font-bold">3.</span> สูญเสียความมั่นใจในตัวเอง</p>
                </div>
            </div>
            <button id="finish-correct-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                ถัดไป
            </button>
        </div>
    </div>

    <div id="wrong-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                    class="w-24 h-auto rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-2xl font-bold text-indigo-800">พยายามต่อไป!</h3>
                <p class="text-indigo-800 mb-6 text-lg">คำตอบของคุณยังไม่ถูกต้อง</p>
                <h3 class="text-xl font-bold text-indigo-800 mb-4">ผลกระทบของผู้ถูกรังแกทางไซเบอร์</h3>

                <div class="mb-4">
                    <img src="{{ asset('images/game/8/true.png') }}" alt="Character with emotions"
                        class="w-40 h-32 mx-auto">
                </div>

                <div class="text-left space-y-2 mb-6 pr-4 pl-4">
                    <p class="text-indigo-800"><span class="font-bold">1.</span> เคยชินกับการละเมิดกฎ มีพฤติกรรมต่อต้านสังคม
                        โตขึ้นจะเสี่ยงต่อการเป็นอันธพานนำไปสู่กระบวนการทางกฎหมาย</p>
                    <p class="text-indigo-800"><span class="font-bold">2.</span> ความรุนแรงไปใช้ในครอบครัว
                        กลายเป็นวัฏจักรส่งผลถึงลูกหลานให้เคยชินกับการใช้ความรุนแรง</p>
                    <p class="text-indigo-800"><span class="font-bold">3.</span> ออกจากการศึกษาก่อนจบ
                        และมีแนวโน้มที่จะตกงานอีก</p>
                    <p class="text-indigo-800"><span class="font-bold">4.</span> แนวโน้มการการใช้สารเสพติดต่างๆ</p>
                </div>
            </div>
            <button id="show-answer-btn" class="text-white font-medium py-2 px-6 rounded-lg transition-colors" style="background-color: #929AFF;" onmouseover="this.style.backgroundColor='#929AFF'" onmouseout="this.style.backgroundColor='#929AFF'">
                ถัดไป
            </button>
        </div>
    </div>

    @include('layouts.game.script.8_9_10.index')

    <script>
        window.gameNextRoute = "{{ route('game_10') }}";
    </script>
@endsection