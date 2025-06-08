@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 10</h3>
            <p class="text-lg text-indigo-800 mb-4">น้องๆ คิดว่าการ Cyberbullying ผิดกฎหมายหรือไม่</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-2">
            <h2 class="text-xl font-bold text-indigo-800">น้องๆ คิดว่าการ CYBERBULLYING ผิดกฎหมายหรือไม่</h2>
        </div>

        <!-- Choice Buttons -->
        <div class="space-y-4 max-w-md mx-auto">
            <button id="illegal-btn"
                class="w-full bg-[#929AFF] text-white font-medium py-2 px-3 rounded-xl transition-all hover:bg-[#7B85FF] hover:transform hover:translateY(-1px) text-lg shadow-lg hover:shadow-xl mb-2">
                ผิดกฎหมาย
            </button>

            <button id="legal-btn"
                class="w-full bg-[#929AFF] text-white font-medium py-2 px-3 rounded-xl transition-all hover:bg-[#7B85FF] hover:transform hover:translateY(-1px) text-lg shadow-lg hover:shadow-xl">
                ไม่ผิดกฎหมาย
            </button>
        </div>

        <!-- Illustration -->
        <div class="flex justify-center mt-10">
            <div class="bg-white rounded-xl p-6 max-w-sm w-full ml-6 mr-6" style="box-shadow: 0 0 15px rgba(0,0,0,0.1);">
                <img src="{{ asset('images/game/10/law.png') }}" alt="Cyberbullying Illustration"
                    class="w-full h-auto object-contain">
            </div>
        </div>
    </div>

    <!-- Correct Answer Modal -->
    <div id="correct-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 text-center">
            <div class="mb-6">
                <div class="text-center mb-10 relative">
                    <div class="flex items-center justify-center">
                        <div class="relative">
                            <h1 class="text-xl font-bold text-indigo-800 inline-block">CYBERBULLYING</h1>
                            <p class="text-lg text-indigo-800 absolute -bottom-6 right-0">ผิดกฎหมาย</p>
                        </div>
                    </div>
                </div>

                <!-- Illustration -->
                <div class="mb-4">
                    <img src="{{ asset('images/game/10/answer.png') }}" alt="Cyberbullying Icons"
                        class="w-32 h-auto mx-auto object-contain">
                </div>

                <h4 class="text-left font-bold text-indigo-800 mb-2">ข้อควรระวัง</h4>

                <!-- Details Text -->
                <div class="text-left text-sm text-gray-700 leading-relaxed space-y-2">
                    <p><span class="font-medium ml-6">พ.ร.บ.</span> คอมพิวเตอร์ <span class="font-medium">มาตรา 14</span>
                        กรณีโพสต์ข้อมูลที่บิดเบือน หรือปลอมแปลง ไม่ว่าจะทั้งหมดหรือบางส่วน หรือข้อมูลที่เป็นเท็จ
                        ซึ่งคนอื่นสามารถเข้าไปดูข้อมูลนั้นได้ ทำให้ผู้อื่นเสียหาย รวมทั้งข้อมูลลามกต่างๆ
                        ทั้งผู้โพสต์และผู้เผยแพร่ส่งต่อ จะมีความผิดต้องระวางโทษจำคุกไม่เกิน <span class="font-medium">5
                            ปี</span>
                        หรือปรับไม่เกิน <span class="font-medium">100,000 บาท</span> หรือทั้งจำทั้งปรับ</p>
                </div>
            </div>

            <button id="correct-continue-btn"
                class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                ถัดไป
            </button>
        </div>
    </div>

    <!-- Wrong Answer Modal -->
    <div id="wrong-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4"
                    style="background-color: #DD2F2F;">
                    <img src="{{ asset('images/material/incorrect.png') }}" alt="Wrong" class="w-12 h-12">
                </div>
                <h3 class="text-lg font-bold text-indigo-800 mb-4">ตัวเลือกของคุณยังไม่ถูก</h3>
                <p class="text-base text-indigo-800">CYBERBULLYING ผิดกฎหมาย และมีบทลงโทษตามกฎหมายที่กำหนด</p>
            </div>

            <button id="show-answer-btn" class="text-white font-medium py-2 px-6 rounded-lg transition-colors"
                style="background-color: #DD2F2F;" onmouseover="this.style.backgroundColor='#B82626'"
                onmouseout="this.style.backgroundColor='#DD2F2F'">
                ดูคำตอบ
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const introModal = document.getElementById('intro-modal');
            const gameContent = document.getElementById('game-content');
            const startGameBtn = document.getElementById('start-game-btn');

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

            // Original game logic
            const illegalBtn = document.getElementById('illegal-btn');
            const legalBtn = document.getElementById('legal-btn');
            const correctOverlay = document.getElementById('correct-overlay');
            const wrongOverlay = document.getElementById('wrong-overlay');
            const correctContinueBtn = document.getElementById('correct-continue-btn');
            const showAnswerBtn = document.getElementById('show-answer-btn');

            // Handle "ผิดกฎหมาย" button click (Correct Answer)
            illegalBtn.addEventListener('click', function() {
                showCorrectModal();
            });

            // Handle "ไม่ผิดกฎหมาย" button click (Wrong Answer)
            legalBtn.addEventListener('click', function() {
                showWrongModal();
            });

            // Handle show answer button (from wrong modal)
            showAnswerBtn.addEventListener('click', function() {
                hideModal(wrongOverlay);
                setTimeout(() => {
                    showCorrectModal();
                }, 500);
            });

            // Handle continue button (from correct modal)
            correctContinueBtn.addEventListener('click', function() {
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

        /* Modal Animation - Background fades in first, then content scales in */
        .animate-modal-show .modal-backdrop {
            animation: backdropFadeIn 0.3s ease-out forwards;
        }

        .animate-modal-show .modal-content {
            animation: contentSlideIn 0.4s ease-out 0.15s both;
        }

        /* Smooth fade out animation for intro modal */
        .animate-modal-fade-out {
            animation: backdropFadeOut 0.3s ease-out forwards;
        }

        .animate-modal-fade-out .modal-content {
            animation: contentScaleOut 0.3s ease-out forwards;
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

        /* Initial state for modal content */
        .modal-content {
            opacity: 0;
            transform: scale(0.8);
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

        /* Button hover effects */
        button:hover {
            transform: translateY(-1px);
        }

        button:active {
            transform: translateY(0);
        }

        /* Remove any borders or outlines */
        img {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }

        @media (max-width: 640px) {

            #correct-overlay .bg-white,
            #wrong-overlay .bg-white {
                margin: 1rem;
                max-width: calc(100% - 2rem);
            }

            .card-container {
                padding: 1rem 0.5rem;
            }

            /* Adjust text size for mobile */
            h2 {
                font-size: 1rem;
            }

            h3 {
                font-size: 1.1rem;
            }

            .text-sm {
                font-size: 0.875rem;
            }

            /* Button adjustments for mobile */
            button {
                padding: 0.75rem 1rem;
                font-size: 1rem;
            }
        }
    </style>
@endsection