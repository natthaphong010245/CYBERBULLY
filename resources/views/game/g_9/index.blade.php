@extends('layouts.game.index')

@section('content')
    <div class="card-container space-y-6 px-6 md:px-0">
        <div class="text-center mb-8">
            <h2 class="text-lg font-bold text-indigo-800">น้อง ๆ คิดว่า ผลกระทบของผู้รังแกมักทำ</h2>
            <h2 class="text-lg font-bold text-indigo-800">ให้เบอร์ จะเป็นอย่างไรบ้าง</h2>
            <p class="text-sm text-indigo-700 mt-2">เลือกรูปให้ตรงกับคำถาม</p>
        </div>
        
        <!-- Choice Cards -->
        <div class="space-y-4">
            <!-- Wrong Choice (Top) -->
            <div class="choice-card wrong-choice bg-white rounded-xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 mr-2 ml-2 mb-12" style="box-shadow: 0 0 15px rgba(0,0,0,0.1);">
                <div class="flex justify-center">
                    <img src="{{ asset('images/game/9/true.png') }}" alt="Emotional Impact" class="w-80 h-48 object-contain">
                </div>
            </div>
            
            <!-- Correct Choice (Bottom) -->
            <div class="choice-card correct-choice bg-white rounded-xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 mr-2 ml-2 mb-12" style="box-shadow: 0 0 15px rgba(0,0,0,0.1);">
                <div class="flex justify-center">
                    <img src="{{ asset('images/game/9/false.png') }}" alt="Work Impact" class="w-80 h-48 object-contain">
                </div>
            </div>
        </div>
    </div>

    <!-- Correct Answer Modal -->
    <div id="correct-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-20 h-20  rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-bold text-indigo-800 mb-4">ผลกระทบของผู้ถูกรังแกมักทำให้เบอร์</h3>
                
                <!-- Character Image -->
                <div class="mb-4">
                    <img src="{{ asset('images/game/9/false.png') }}" alt="Character with emotions" class="w-40 h-32 mx-auto">
                </div>
                
                <!-- Answer List -->
                <div class="text-left space-y-2 mb-6 ml-2 mr-2">
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

    <!-- Wrong Answer Modal -->
    <div id="wrong-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #DD2F2F;">
                    <img src="{{ asset('images/material/incorrect.png') }}" alt="Wrong" class="w-12 h-12">
                </div>
                <h3 class="text-lg font-bold text-indigo-800 mb-2">ตัวเลือกของคุณยังไม่ถูก</h3>
                <p class="text-indigo-800">ไปดูคำตอบที่ถูกกัน</p>
            </div>
            <button id="show-answer-btn" class="text-white font-medium py-2 px-6 rounded-lg transition-colors" style="background-color: #DD2F2F;" onmouseover="this.style.backgroundColor='#B82626'" onmouseout="this.style.backgroundColor='#DD2F2F'">
                ดูคำตอบ
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const correctChoice = document.querySelector('.correct-choice');
            const wrongChoice = document.querySelector('.wrong-choice');
            const correctOverlay = document.getElementById('correct-overlay');
            const wrongOverlay = document.getElementById('wrong-overlay');
            const finishCorrectBtn = document.getElementById('finish-correct-btn');
            const showAnswerBtn = document.getElementById('show-answer-btn');
            
            // Handle correct choice click
            correctChoice.addEventListener('click', function() {
                showCorrectModal();
            });
            
            // Handle wrong choice click
            wrongChoice.addEventListener('click', function() {
                showWrongModal();
            });
            
            // Handle show answer button (from wrong modal)
            showAnswerBtn.addEventListener('click', function() {
                hideModal(wrongOverlay);
                setTimeout(() => {
                    showCorrectModal();
                }, 500);
            });
            
            // Handle finish button (from correct modal)
            finishCorrectBtn.addEventListener('click', function() {
                hideModal(correctOverlay);
                setTimeout(() => {
                    window.location.href = "{{ route('main') }}";
                }, 500);
            });
            
            function showCorrectModal() {
                correctOverlay.classList.remove('hidden');
                correctOverlay.classList.add('animate-fadeIn');
            }
            
            function showWrongModal() {
                wrongOverlay.classList.remove('hidden');
                wrongOverlay.classList.add('animate-fadeIn');
            }
            
            function hideModal(modal) {
                modal.classList.remove('animate-fadeIn');
                modal.classList.add('animate-fadeOut');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('animate-fadeOut');
                }, 500);
            }
        });
    </script>
    
    <style>
        /* Modal animations */
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out forwards;
        }
        
        .animate-fadeOut {
            animation: fadeOut 0.5s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            0% { 
                opacity: 0; 
            }
            100% { 
                opacity: 1; 
            }
        }
        
        @keyframes fadeOut {
            0% { 
                opacity: 1; 
            }
            100% { 
                opacity: 0; 
            }
        }
        
        /* Modal content animations */
        #correct-overlay .bg-white,
        #wrong-overlay .bg-white {
            animation: modalSlideIn 0.5s ease-in-out forwards;
        }
        
        #correct-overlay.animate-fadeOut .bg-white,
        #wrong-overlay.animate-fadeOut .bg-white {
            animation: modalSlideOut 0.5s ease-in-out forwards;
        }
        
        @keyframes modalSlideIn {
            0% { 
                opacity: 0; 
                transform: scale(0.9) translateY(-20px); 
            }
            100% { 
                opacity: 1; 
                transform: scale(1) translateY(0); 
            }
        }
        
        @keyframes modalSlideOut {
            0% { 
                opacity: 1; 
                transform: scale(1) translateY(0); 
            }
            100% { 
                opacity: 0; 
                transform: scale(0.9) translateY(-20px); 
            }
        }
        
        /* Choice card hover effects */
        .choice-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 25px rgba(0,0,0,0.15) !important;
        }
        
        .choice-card:active {
            transform: translateY(0);
            box-shadow: 0 0 15px rgba(0,0,0,0.1) !important;
        }
        
        /* Remove any borders or outlines */
        img {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
        
        @media (max-width: 640px) {
            .choice-card img {
                width: 100%;
                height: 160px;
            }
            
            #correct-overlay .bg-white {
                margin: 1rem;
                max-width: calc(100% - 2rem);
            }
            
            #wrong-overlay .bg-white {
                margin: 1rem;
                max-width: calc(100% - 2rem);
            }
            
            .card-container {
                padding: 1rem 0.5rem;
            }
            
            /* Adjust text size for mobile */
            h3 {
                font-size: 1.1rem;
            }
            
            /* Better spacing for mobile */
            .space-y-2 > * + * {
                margin-top: 0.75rem;
            }
        }
    </style>
@endsection