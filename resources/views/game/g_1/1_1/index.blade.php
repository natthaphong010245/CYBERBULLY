@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 1</h3>
            <p class="text-lg text-indigo-800 mb-4">พฤติกรรมแบบนี้เป็นการรังแกรูปแบบใหม่</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0 mb-6" id="game-content">
        <div class="text-center mb-2">
            <h2 class="text-xl font-bold text-indigo-800">พฤติกรรมแบบนี้เป็นการรังแกรูปแบบไหนกัน</h2>
        </div>

        <!-- Scenario Image -->
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-2xl shadow-lg">
                <div class="rounded-lg overflow-hidden">
                    <img src="{{ asset('images/game/1/physical_bullying.png') }}" alt="Physical Bullying Scenario"
                        class="w-full h-52 object-cover rounded-lg">
                </div>
            </div>
        </div>

        <!-- Answer Options -->
        <div class="mb-2">
            <div class="flex items-center justify-center mb-4 mt-2">
                <div class="flex-1 h-px bg-gray-400 max-w-28"></div>
                <h3 class="text-center text-gray-500 text-lg mx-4">ตัวเลือก</h3>
                <div class="flex-1 h-px bg-gray-400 max-w-28"></div>
            </div>
            <div class="grid grid-cols-2 gap-3 max-w-xs mx-auto" id="answer-options">
                <div class="answer-option cursor-pointer" data-answer="physical" data-correct="true">
                    <div
                        class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">กาย</div>
                    </div>
                </div>
                <div class="answer-option cursor-pointer" data-answer="verbal" data-correct="false">
                    <div
                        class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">วาจา</div>
                    </div>
                </div>
                <div class="answer-option cursor-pointer" data-answer="social" data-correct="false">
                    <div
                        class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">สังคม</div>
                    </div>
                </div>
                <div class="answer-option cursor-pointer" data-answer="cyber" data-correct="false">
                    <div
                        class="bg-indigo-500 text-white rounded-xl p-4 text-center font-medium transition-all hover:bg-indigo-600 hover:scale-105 h-20 flex flex-col justify-center">
                        <div class="text-lg">การรังแกทาง</div>
                        <div class="text-xl">ไซเบอร์</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal"
        class="modal-backdrop fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl.png') }}" alt="Happy Student"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800">เยี่ยมมาก!</h3>
            <p class="text-lg text-indigo-800 mb-4">คุณตอบได้ถูกต้อง</p>
            <p class="text-indigo-800 text-xl font-bold mb-1">เริ่มความท้าทายเกมต่อไปกันเลย</p>
            <button id="success-btn"
                class="bg-[#929AFF] text-white font-medium text-lg py-2 px-8 rounded-xl transition-colors hover:bg-indigo-600">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Failure Modal -->
    <div id="failure-modal"
        class="modal-backdrop fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ลองอีกครั้ง</h3>
            <p class="text-lg text-indigo-800 mb-4">คำตอบของคุณยังไม่ถูกต้อง</p>

            <!-- Show correct answer with image -->
            <div class="mb-4">
                <img src="{{ asset('images/game/1/physical_bullying.png') }}" alt="Physical Bullying"
                    class="w-full h-auto object-cover rounded mb-2">
                <p class="text-indigo-800 text-2xl">การรังแกทางกาย</p>
            </div>

            <p class="text-indigo-800 font-bold text-xl mb-1">เริ่มความท้าทายเกมถัดไปกันเลย</p>
            <button id="failure-btn"
                class="bg-[#929AFF] text-white font-medium text-lg py-2 px-8 rounded-xl transition-colors hover:bg-indigo-600">
                ถัดไป
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const introModal = document.getElementById('intro-modal');
            const gameContent = document.getElementById('game-content');
            const startGameBtn = document.getElementById('start-game-btn');
            const answerOptions = document.querySelectorAll('.answer-option');
            const successModal = document.getElementById('success-modal');
            const failureModal = document.getElementById('failure-modal');
            const successBtn = document.getElementById('success-btn');
            const failureBtn = document.getElementById('failure-btn');

            // Show intro modal with animation
            setTimeout(() => {
                introModal.classList.add('animate-modal-show');
                gameContent.classList.add('game-blur'); // Blur the game content
            }, 100);

            // Handle start game button
            startGameBtn.addEventListener('click', function() {
                // Add fade out animation to intro modal
                introModal.classList.remove('animate-modal-show');
                introModal.classList.add('animate-modal-fade-out');

                setTimeout(() => {
                    introModal.style.display = 'none';
                    gameContent.classList.remove('game-blur'); // Remove blur from game
                    gameContent.classList.add('animate-unblur'); // Add unblur animation
                }, 300); // Match the animation duration
            });

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
                successModal.classList.add('animate-modal-show');
            }

            function showFailureModal() {
                failureModal.classList.remove('hidden');
                failureModal.classList.add('animate-modal-show');
            }

            // Button click handlers
            successBtn.addEventListener('click', function() {
                window.location.href = "{{ route('game_1_2') }}";
            });

            failureBtn.addEventListener('click', function() {
                window.location.href = "{{ route('game_1_2') }}";
            });

            // Close modal when clicking outside (except intro modal)
            [successModal, failureModal].forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                        modal.classList.remove('animate-modal-show');
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
        /* Modal Animation - Background fades in first, then content scales in */
        .animate-modal-show .modal-backdrop {
            animation: backdropFadeIn 0.3s ease-out forwards;
        }

        .animate-modal-show .modal-content {
            animation: contentSlideIn 0.4s ease-out 0.15s both;
        }

        /* Modal hide animation */
        .animate-modal-hide {
            animation: modalHide 0.3s ease-out forwards;
        }

        /* Smooth fade out animation for intro modal */
        .animate-modal-fade-out {
            animation: backdropFadeOut 0.3s ease-out forwards;
        }

        .animate-modal-fade-out .modal-content {
            animation: contentScaleOut 0.3s ease-out forwards;
        }

        /* Game content fade in - Not used anymore but kept for compatibility */
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes backdropFadeIn {
            0% {
                background-color: rgba(0, 0, 0, 0);
            }

            100% {
                background-color: rgba(0, 0, 0, 0.4);
            }
        }

        @keyframes contentSlideIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes modalHide {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.8);
            }
        }

        @keyframes modalFadeOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(0.95);
            }

            100% {
                opacity: 0;
                transform: scale(0.9);
                visibility: hidden;
            }
        }

        @keyframes backdropFadeOut {
            0% {
                background-color: rgba(0, 0, 0, 0.4);
            }

            100% {
                background-color: rgba(0, 0, 0, 0);
                visibility: hidden;
            }
        }

        @keyframes contentScaleOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.3); // Scale down smaller for "วาปเล็กลง" effect
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }

            50% {
                opacity: 0.7;
                transform: translateY(15px) scale(0.98);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Initial state for modal content */
        .modal-content {
            opacity: 0;
            transform: scale(0.8);
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

        /* Game content blur effects */
        .game-blur {
            filter: blur(3px);
            transition: filter 0.3s ease-out;
            transform: scale(1.02);
            /* Slightly zoom in when blurred */
        }

        .animate-unblur {
            animation: unblurGame 0.4s ease-out forwards;
        }

        @keyframes unblurGame {
            0% {
                filter: blur(3px);
                transform: scale(1.02);
            }

            100% {
                filter: blur(0px);
                transform: scale(1);
            }
        }

        /* Game content with smooth transitions */
        #game-content {
            opacity: 1;
            transition: all 0.3s ease-out;
        }
    </style>
@endsection
