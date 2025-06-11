@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 11</h3>
            <p class="text-lg text-indigo-800 mb-4">สัญญาณเตือนภัยกับการรังแกทางไซเบอร์</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Main Game Screen -->
    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center">
            <h2 class="text-xl font-bold text-indigo-800">น้องๆ คิดว่าการ CYBERBULLYING ผิดกฎหมายหรือไม่</h2>
        </div>

        <div class="flex items-center text-gray-500 text-sm mb-4">
            <div class="flex-1 border-b border-gray-200"></div>
            <span class="px-4">เลือกเหตุการณ์ เพื่ออ่านข้อมูลเพิ่มเติม</span>
            <div class="flex-1 border-b border-gray-200"></div>
        </div>

        <!-- Warning Signal Options (Top Section) -->
        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="card-hover bg-white border-2 border-gray-300 rounded-2xl p-2 text-center"
                onclick="showSignalDetails(1)">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/game/warning_signal.png') }}" alt="สัญญาณเตือน"
                        class="w-16 h-16 object-contain pulse-animation">
                </div>
                <div class="text-indigo-800 font-bold text-lg">สัญญาณเตือน</div>
                <div class="text-indigo-800 text-2xl font-bold">1</div>
            </div>

            <div class="card-hover bg-white border-2 border-gray-300 rounded-2xl p-2 text-center"
                onclick="showSignalDetails(2)">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/game/warning_signal.png') }}" alt="สัญญาณเตือน"
                        class="w-16 h-16 object-contain pulse-animation">
                </div>
                <div class="text-indigo-800 font-bold text-lg">สัญญาณเตือน</div>
                <div class="text-indigo-800 text-2xl font-bold">2</div>
            </div>
        </div>

        <!-- Answer Choices (Bottom Section) -->
        <div class="flex items-center text-gray-500 text-sm mb-2 mt-8">
            <div class="flex-1 border-b border-gray-200"></div>
            <span class="px-4">ตัวเลือก</span>
            <div class="flex-1 border-b border-gray-200"></div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <button class="bg-indigo-800 text-white rounded-xl py-6 text-lg card-hover" onclick="selectAnswer(1)">
                สัญญาณเตือน<br>
                <h class="text-3xl font-bold">1</h>
            </button>
            <button class="bg-indigo-800 text-white rounded-xl py-6 text-lg card-hover" onclick="selectAnswer(2)">
                สัญญาณเตือน<br>
                <h class="text-3xl font-bold">2</h>
            </button>
        </div>
    </div>

    <!-- Signal Details Modal -->
    <div id="signal-modal"
        class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden items-center justify-center z-50">
        <div class="modal-content bg-white rounded-3xl shadow-2xl p-8 max-w-sm mx-4 text-center">
            <h2 class="text-xl font-bold text-indigo-800 mb-4">
                สัญญาณเตือนภัยกับงบนอกถังผู้ถูกกลั่นแกล้งทางไซเบอร์
            </h2>

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/game/warning_signal.png') }}" alt="สัญญาณเตือน"
                    class="w-20 h-20 object-contain pulse-animation">
            </div>
            <div class="text-indigo-800 font-bold text-xl mb-4 text-center">
                <div class="flex items-center mb-2">
                    <div class="flex-1 border-b-2 border-indigo-700"></div>
                    <span class="px-4">สัญญาณเตือน</span>
                    <div class="flex-1 border-b-2 border-indigo-700"></div>
                </div>
                <div class="text-2xl" id="signal-number">1</div>
            </div>

            <div id="signal-content" class="text-indigo-800 text-sm mb-6 leading-relaxed text-left">
                <!-- Content will be inserted here -->
            </div>

            <button onclick="closeSignalModal()"
                class="bg-[#929AFF] text-white px-8 py-2 rounded-xl font-medium hover:bg-purple-600 transition-colors">
                ปิด
            </button>
        </div>
    </div>

    <!-- Success Modal (เยี่ยมมาก!) -->
    <div id="success-modal"
        class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden items-center justify-center z-50">
        <div class="modal-content bg-white rounded-3xl shadow-2xl p-8 max-w-sm mx-4 text-center">
            <h2 class="text-xl font-bold text-indigo-800 mb-4">
                สัญญาณเตือนภัยกับงบนอกถังผู้ถูกกลั่นแกล้งทางไซเบอร์
            </h2>

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="Character"
                    class="w-24 h-24 object-contain rounded-full">
            </div>

            <div class="text-2xl font-bold text-indigo-800">เยี่ยมมาก!</div>
            <div class="text-indigo-800 mb-4">คุณตอบได้ถูกต้อง</div>
            <div class="text-indigo-800 text-lg font-bold mb-2">เริ่มความท้าทายเกมต่อไปกัน</div>

            <button onclick="goToMain()"
                class="bg-[#929AFF] text-white px-8 py-2 rounded-xl font-medium transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Retry Modal (ลองอีกครั้ง!) -->
    <div id="retry-modal"
        class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden items-center justify-center z-50">
        <div class="modal-content bg-white rounded-3xl shadow-2xl p-8 max-w-sm mx-4 text-center">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="Character"
                    class="w-24 h-24 object-contain rounded-full">
            </div>

            <div class="text-2xl font-bold text-indigo-800 mb-2">ลองอีกครั้ง!</div>
            <div class="text-indigo-800 mb-4">คำตอบของคุณยังไม่ถูกต้อง</div>

            <div class="rounded-xl p-4 mb-6 text-left">
                <div class="text-indigo-800 font-bold mb-2 text-center">
                    สัญญาณเตือนภัยกับงบนอกถังผู้ถูกกลั่น<br>
                    แกล้งทางไซเบอร์
                </div>
                <div class="text-indigo-800 text-lg font-bold mb-2 text-center">
                    <div class="flex items-center mb-2">
                        <div class="flex-1 border-b-2 border-indigo-700"></div>
                        <span class="px-4">สัญญาณเตือน</span>
                        <div class="flex-1 border-b-2 border-indigo-700"></div>
                    </div>
                    <div class="text-xl">1</div>
                </div>
                <div class="text-indigo-800 text-sm leading-relaxed">
                    หลีกเลี่ยงการถ่ายภาพคนโดยไม่คูลใจรองเรียน
                    เก็บตัวโดยอาคิสจังหบใครมีบุนของตัดตัว เองไว
                    แล้วยิ่น เช่น ตั้งฉายและ ไม่มีการกู
                </div>
            </div>

            <div class="text-indigo-800 text-lg font-bold mb-2">เริ่มความท้าทายเกมต่อไปให้กันเลย</div>

            <button onclick="goToMain()"
                class="bg-[#929AFF] text-white px-8 py-2 rounded-xl font-medium transition-colors">
                เริ่ม
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const introModal = document.getElementById('intro-modal');
            const mainScreen = document.getElementById('main-screen');
            const startGameBtn = document.getElementById('start-game-btn');

            // Show intro modal first with animation
            setTimeout(() => {
                introModal.classList.add('modal-show');
                mainScreen.classList.add('game-blur'); // Blur the game content
            }, 100);

            // Handle start game button
            startGameBtn.addEventListener('click', function() {
                // Hide intro modal
                introModal.classList.remove('modal-show');
                introModal.classList.add('modal-fade-out');

                setTimeout(() => {
                    introModal.style.display = 'none';
                    mainScreen.classList.remove('game-blur'); // Remove blur from game
                    mainScreen.classList.add('animate-unblur'); // Add unblur animation
                }, 300);
            });
        });

        // Signal content data with different content for each signal
        const signalData = {
            1: {
                title: "สัญญาณเตือน\n1",
                content: `หลีกเลี่ยงการถ่ายภาพคนโดยไม่คูลใจรองเรียน
เก็บตัวโดยอาคิสจังหบใครมีบุนของตัดตัว เองไว
แล้วยิ่น เช่น ตั้งฉายและ ไม่มีการกู`
            },
            2: {
                title: "สัญญาณเตือน\n2",
                content: `-สามารถใโรงเรียนได้มดี
-สตใส ร่าเริง เพราะคิดว่าเขาไม่จะลองเป็นการ
เรียนของ engagement บมไม่เขียว`
            }
        };

        function showSignalDetails(signalNumber) {
            const modal = document.getElementById('signal-modal');
            const numberSpan = document.getElementById('signal-number');
            const contentDiv = document.getElementById('signal-content');

            // Set content based on selected signal
            numberSpan.textContent = signalNumber;
            contentDiv.textContent = signalData[signalNumber].content;

            // Show modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                modal.classList.add('modal-show');
            }, 10);
        }

        function closeSignalModal() {
            const modal = document.getElementById('signal-modal');
            modal.classList.remove('modal-show');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function selectAnswer(choice) {
            // Close any open modals first
            closeSignalModal();

            setTimeout(() => {
                if (choice === 1) {
                    // ถูกต้อง - แสดง "เยี่ยมมาก!"
                    showSuccessModal();
                } else {
                    // ผิด - แสดง "ลองอีกครั้ง!"
                    showRetryModal();
                }
            }, 500);
        }

        function showSuccessModal() {
            const modal = document.getElementById('success-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                modal.classList.add('modal-show');
            }, 10);
        }

        function showRetryModal() {
            const modal = document.getElementById('retry-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                modal.classList.add('modal-show');
            }, 10);
        }

        function goToMain() {
            // Navigate to main page
            window.location.href = "{{ route('main') }}";
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-backdrop')) {
                if (e.target.id === 'signal-modal') {
                    closeSignalModal();
                }
            }
        });

        // Prevent modal close when clicking inside modal content
        document.querySelectorAll('.modal-content').forEach(modal => {
            modal.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>

    <style>
        .modal-backdrop {
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }

        .modal-content {
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal-show .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        .modal-fade-out {
            animation: modalFadeOut 0.3s ease-out forwards;
        }

        .modal-fade-out .modal-content {
            animation: contentScaleOut 0.3s ease-out forwards;
        }

        @keyframes modalFadeOut {
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
                transform: scale(0.3);
            }
        }

        /* Game content blur effects */
        .game-blur {
            filter: blur(3px);
            transition: filter 0.3s ease-out;
            transform: scale(1.02);
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

        .card-hover {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        /* Button animations */
        button {
            transition: all 0.2s ease;
        }

        button:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        button:active:not(:disabled) {
            transform: translateY(0);
        }

        /* Responsive adjustments - ลบการ override text-xl ออก */
        @media (max-width: 640px) {
            .p-8 {
                padding: 1.5rem;
            }

            .gap-4 {
                gap: 0.75rem;
            }
        }
    </style>
@endsection