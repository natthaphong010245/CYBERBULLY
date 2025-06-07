@extends('layouts.game.index')

@section('content')
    <div class="card-container space-y-6 px-6 md:px-0 mb-6">
        <div class="text-center mb-2">
            <h2 class="text-xl font-bold text-indigo-800">พฤติกรรมแบบนี้เป็นการรังแกรูป</h2>
            <h2 class="text-xl font-bold text-indigo-800">แบบใหนกันนะ</h2>
        </div>
        
        <!-- Scenario Image -->
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-2xl shadow-lg">
                <div class="rounded-lg overflow-hidden">
                    <img src="{{ asset('images/game/1/verbal_bullying.png') }}" alt="Physical Bullying Scenario" class="w-full h-52 object-cover rounded-lg">
                </div>
            </div>
        </div>
        
        <!-- Answer Options -->
        <div class="mb-2">
            <div class="flex items-center justify-center mb-4 mt-2">
                <div class="flex-1 h-px bg-gray-400 max-w-28"></div>
                <h3 class="text-center text-gray-500 text-sm mx-4">ตัวเลือก</h3>
                <div class="flex-1 h-px bg-gray-400 max-w-28"></div>
            </div>
            <div class="grid grid-cols-2 gap-3 max-w-xs mx-auto" id="answer-options">
                <div class="answer-option cursor-pointer" data-answer="physical" data-correct="false">
                    <div class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">กาย</div>
                    </div>
                </div>
                <div class="answer-option cursor-pointer" data-answer="verbal" data-correct="true">
                    <div class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">วาจา</div>
                    </div>
                </div>
                <div class="answer-option cursor-pointer" data-answer="social" data-correct="false">
                    <div class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">สังคม</div>
                    </div>
                </div>
                <div class="answer-option cursor-pointer" data-answer="cyber" data-correct="false">
                    <div class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">ไซเบอร์</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl.png') }}" alt="Happy Student" class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-xl font-bold text-indigo-800">เยี่ยมมาก!</h3>
            <p class="text-indigo-800 mb-2">คุณตอบได้ถูกต้อง</p>
            <p class="text-indigo-800 text-lg mb-1">เริ่มความท้าทายเกมต่อไปกันเลย</p>
            <button id="success-btn" class="bg-[#929AFF] text-white font-medium text-lg py-3 px-8 rounded-xl transition-colors hover:bg-indigo-600">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Failure Modal -->
    <div id="failure-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-xl font-bold text-indigo-800">ลองอีกครั้ง</h3>
            <p class="text-indigo-800 mb-4">คำตอบของคุณยังไม่ถูกต้อง</p>
            
            <!-- Show correct answer with image -->
            <div class="mb-4">
                <img src="{{ asset('images/game/1/verbal_bullying.png') }}" alt="Verbal Bullying" class="w-full h-auto object-cover rounded mb-2">
                <p class="text-indigo-700 font-bold text-xl">การรังแกทางวาจา</p>
            </div>
            
            <p class="text-indigo-800 text-lg mb-1">เริ่มความท้าทายเกมถัดไปกันเลย</p>
            <button id="failure-btn" class="bg-[#929AFF] text-white font-medium text-lg py-3 px-8 rounded-xl transition-colors hover:bg-indigo-600">
                ถัดไป
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const answerOptions = document.querySelectorAll('.answer-option');
            const successModal = document.getElementById('success-modal');
            const failureModal = document.getElementById('failure-modal');
            const successBtn = document.getElementById('success-btn');
            const failureBtn = document.getElementById('failure-btn');
            
            // Handle answer option clicks
            answerOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const isCorrect = this.getAttribute('data-correct') === 'true';
                    const answer = this.getAttribute('data-answer');
                    
                    // Disable all options to prevent multiple clicks
                    answerOptions.forEach(opt => {
                        opt.style.pointerEvents = 'none';
                        const optDiv = opt.querySelector('div');
                        optDiv.classList.add('opacity-50');
                    });
                    
                    // Highlight selected option
                    const selectedDiv = this.querySelector('div');
                    if (isCorrect) {
                        selectedDiv.style.backgroundColor = '#10b981'; // green
                        selectedDiv.classList.remove('opacity-50');
                    } else {
                        selectedDiv.style.backgroundColor = '#ef4444'; // red
                        selectedDiv.classList.remove('opacity-50');
                    }
                    
                    // Show result after short delay
                    setTimeout(() => {
                        if (isCorrect) {
                            showSuccessModal();
                        } else {
                            showFailureModal();
                        }
                    }, 800);
                });
            });
            
            function showSuccessModal() {
                successModal.classList.remove('hidden');
                successModal.classList.add('animate-fadeIn');
            }
            
            function showFailureModal() {
                failureModal.classList.remove('hidden');
                failureModal.classList.add('animate-fadeIn');
            }
            
            // Button click handlers
            successBtn.addEventListener('click', function() {
                window.location.href = "{{ route('main') }}";
            });
            
            failureBtn.addEventListener('click', function() {
                window.location.href = "{{ route('main') }}";
            });
            
            // Close modal when clicking outside
            [successModal, failureModal].forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                        resetGame();
                    }
                });
            });
            
            function resetGame() {
                answerOptions.forEach(opt => {
                    opt.style.pointerEvents = 'auto';
                    const optDiv = opt.querySelector('div');
                    optDiv.classList.remove('opacity-50');
                    optDiv.style.backgroundColor = '#6366f1'; // Reset to original indigo
                });
            }
        });
    </script>
    
    <style>
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            0% { 
                opacity: 0; 
                transform: scale(0.9); 
            }
            100% { 
                opacity: 1; 
                transform: scale(1); 
            }
        }
        
        .answer-option {
            transition: all 0.3s ease;
        }
        
        .answer-option:hover div {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        
        .answer-option div {
            transition: all 0.3s ease;
        }
        
        .answer-option:active div {
            transform: scale(0.95);
        }
        
        .answer-option[style*="pointer-events: none"] div {
            transform: none !important;
            box-shadow: none !important;
        }
    </style>
@endsection