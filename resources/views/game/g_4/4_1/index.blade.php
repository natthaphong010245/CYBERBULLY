@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 4</h3>
            <p class="text-lg text-indigo-800 mb-2">จับคู่รูปภาพกับข้อความที่เกี่ยวกับการรังแกทางไซเบอร์</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0 game-blur" id="game-content">
        <div class="text-center">
            <h2 class="text-xl font-bold text-indigo-800 ">จับคู่รูปภาพกับข้อความที่เกี่ยวกับการรังแกทางไซเบอร์</h2>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- แถวที่ 1 -->
            <div class="grid grid-cols-2 gap-10 mb-8">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="1">
                    การปะทะคารม
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="1">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/groom.png') }}" alt="การกล่อมหม" class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">การกล่อมหม</div>
                    </div>
                </div>
            </div>

            <!-- แถวที่ 2 -->
            <div class="grid grid-cols-2 gap-10 mb-8">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="2">
                    การก่อกวน
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="2">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/cover.png') }}" alt="การปกปิดการณม"
                                class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">การปกปิดการณม</div>
                    </div>
                </div>
            </div>

            <!-- แถวที่ 3 -->
            <div class="grid grid-cols-2 gap-10 mb-8">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="3">
                    การใส่ร้ายป้ายสี
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="3">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/exclude.png') }}" alt="รวมรอบ เป็นคนซัน"
                                class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">รวมรอบ เป็นคนซัน</div>
                    </div>
                </div>
            </div>

            <!-- แถวที่ 4 -->
            <div class="grid grid-cols-2 gap-10 mb-6">
                <div class="text-option bg-[#5B21B6] text-white rounded-xl p-6 cursor-pointer transition-all duration-300 relative text-center font-bold text-xl h-28 flex items-center justify-center"
                    data-text="4">
                    สวมรอยเป็นคนอื่น
                </div>
                <div class="image-option border-2 rounded-xl p-4 border-gray-300 bg-white cursor-pointer transition-all duration-300 relative h-28"
                    data-image="4">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ asset('images/game/4/defame.png') }}" alt="การใส่ร้าย ป้ายสี"
                                class="h-16 object-contain">
                        </div>
                        <div class="text-center text-gray-700 font-bold text-sm">การใส่ร้าย ป้ายสี</div>
                    </div>
                </div>
            </div>
            <div class="progress-container pl-2 pr-2 mt-8">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div id="progress-bar"
                        class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2 rounded-full transition-all duration-500 ease-out"
                        style="width: 0%"></div>
                </div>
                <div class="flex justify-between items-center mt-2 pl-2 pr-2">
                    <span class="text-center text-gray-600 text-sm block">ความคืบหน้า</span>
                    <span id="progress-percentage" class="text-gray-600 text-sm">0%</span>
                </div>
            </div>
        </div>
    </div>



    <!-- Updated Completion Modal ตามรูปที่ส่งมา -->
    <div id="complete-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <img src="{{ asset('images/material/school_girl.png') }}" alt="Character" class="w-32 h-auto mx-auto mb-4">
                <h3 class="text-xl font-bold text-indigo-800 mb-2">เยี่ยมมาก!</h3>
                <p class="text-indigo-800">คุณตอบได้ถูกต้อง</p>
                <p class="text-indigo-800">เริ่มความท้าทายในเกมต่อไปกัน</p>
            </div>
            <button id="finish-game-btn"
                class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                เริ่ม
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
            }, 100);

            // Handle start game button
            startGameBtn.addEventListener('click', function() {
                introModal.classList.remove('animate-modal-show');
                introModal.classList.add('animate-modal-fade-out');

                setTimeout(() => {
                    introModal.style.display = 'none';
                    gameContent.classList.remove('game-blur');
                    gameContent.classList.add('animate-unblur');
                }, 300);
            });

            // Game logic
            let selectedText = null;
            let selectedImage = null;
            let matchedPairs = 0;
            const totalPairs = 4;

            // Matching pairs: text -> image
            const correctMatches = {
                '1': '2', // การปกปิดการณม -> รูปการปกปิดการณม
                '2': '1', // การกล่อมหม -> รูปการกล่อมหม
                '3': '4', // การใส่ร้าย ป้ายสี -> รูปการใส่ร้าย ป้ายสี
                '4': '3' // รวมรอบ เป็นคนซัน -> รูปรวมรอบ เป็นคนซัน
            };



            // Text selection logic
            document.querySelectorAll('.text-option').forEach(option => {
                option.addEventListener('click', function() {
                    if (this.classList.contains('matched')) return;

                    document.querySelectorAll('.text-option').forEach(opt => {
                        if (!opt.classList.contains('matched')) {
                            opt.classList.remove('ring-4', 'ring-blue-400',
                                'ring-opacity-50');
                        }
                    });

                    this.classList.add('ring-4', 'ring-blue-400', 'ring-opacity-50');
                    selectedText = this.getAttribute('data-text');

                    checkForMatch();
                });
            });

            // Image selection logic
            document.querySelectorAll('.image-option').forEach(option => {
                option.addEventListener('click', function() {
                    if (this.classList.contains('matched')) return;

                    document.querySelectorAll('.image-option').forEach(opt => {
                        if (!opt.classList.contains('matched')) {
                            opt.classList.remove('border-blue-400', 'bg-blue-50', 'ring-4',
                                'ring-blue-400', 'ring-opacity-50');
                            opt.classList.add('border-gray-300', 'bg-white');
                        }
                    });

                    this.classList.remove('border-gray-300', 'bg-white');
                    this.classList.add('border-blue-400', 'bg-blue-50', 'ring-4', 'ring-blue-400',
                        'ring-opacity-50');
                    selectedImage = this.getAttribute('data-image');

                    checkForMatch();
                });
            });

            function checkForMatch() {
                if (selectedText && selectedImage) {
                    if (correctMatches[selectedText] === selectedImage) {
                        // Correct match
                        const textElement = document.querySelector(`[data-text="${selectedText}"]`);
                        const imageElement = document.querySelector(`[data-image="${selectedImage}"]`);

                        // Animation เมื่อจับคู่ถูก
                        textElement.style.transform = 'scale(1.05)';
                        imageElement.style.transform = 'scale(1.05)';

                        setTimeout(() => {
                            // เปลี่ยนสีเป็นเขียวเมื่อจับคู่ถูก
                            textElement.classList.remove('ring-4', 'ring-blue-400', 'ring-opacity-50',
                                'bg-[#5B21B6]');
                            textElement.classList.add('bg-green-500', 'matched');
                            textElement.style.transform = 'scale(1)';

                            imageElement.classList.remove('border-blue-400', 'bg-blue-50', 'ring-4',
                                'ring-blue-400', 'ring-opacity-50', 'border-gray-300', 'bg-white');
                            imageElement.classList.add('border-green-500', 'bg-green-100', 'matched');
                            imageElement.style.transform = 'scale(1)';

                            matchedPairs++;
                            updateProgress();

                            // ตรวจสอบว่าจับคู่ครบทุกข้อหรือยัง
                            if (matchedPairs >= totalPairs) {
                                setTimeout(() => {
                                    showCompletionModal();
                                }, 1000);
                            }
                        }, 300);

                        selectedText = null;
                        selectedImage = null;
                    } else {
                        // Incorrect match
                        const textElement = document.querySelector(`[data-text="${selectedText}"]`);
                        const imageElement = document.querySelector(`[data-image="${selectedImage}"]`);

                        // แสดงการสั่นและสีแดงเมื่อผิด
                        textElement.classList.add('ring-4', 'ring-red-400', 'ring-opacity-50');
                        textElement.style.animation = 'shake 0.5s ease-in-out';

                        imageElement.classList.remove('border-blue-400', 'bg-blue-50');
                        imageElement.classList.add('border-red-400', 'bg-red-50');
                        imageElement.style.animation = 'shake 0.5s ease-in-out';

                        setTimeout(() => {
                            // รีเซ็ตกลับสู่สถานะเดิม
                            textElement.classList.remove('ring-4', 'ring-blue-400', 'ring-opacity-50',
                                'ring-red-400');
                            textElement.style.animation = '';

                            imageElement.classList.remove('border-blue-400', 'bg-blue-50', 'border-red-400',
                                'bg-red-50', 'ring-4', 'ring-blue-400', 'ring-opacity-50');
                            imageElement.classList.add('border-gray-300', 'bg-white');
                            imageElement.style.animation = '';

                            selectedText = null;
                            selectedImage = null;
                        }, 1000);
                    }
                }
            }

            function updateProgress() {
                const percentage = Math.round((matchedPairs / totalPairs) * 100);
                const progressBar = document.getElementById('progress-bar');
                const progressPercentage = document.getElementById('progress-percentage');

                if (progressBar && progressPercentage) {
                    // อัปเดต progress bar
                    progressBar.style.width = percentage + '%';

                    // อัปเดตเปอร์เซ็นต์ที่แสดงด้านบน
                    progressPercentage.textContent = percentage + '%';

                    // เพิ่มเอฟเฟกต์เมื่อครบ 100% (เปลี่ยนเป็นสีม่วง)
                    if (percentage === 100) {
                        progressBar.classList.add('animate-pulse');
                        progressPercentage.classList.add('text-gray-600');
                    }
                }

                console.log('Progress updated:', percentage + '%'); // Debug log
            }



            function showCompletionModal() {
                const modal = document.getElementById('complete-overlay');

                if (!modal) {
                    alert('เยี่ยม! คุณผ่านเกมนี้เรียบร้อยแล้ว');
                    window.location.href = "{{ route('main') }}";
                    return;
                }

                // แสดง modal
                modal.classList.remove('hidden');
                modal.style.display = 'flex';

                // Animation fade in
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modal.style.opacity = '1';
                }, 50);

                // ตั้งค่าปุ่มสำหรับการกลับไปหน้าหลัก
                const finishBtn = modal.querySelector('#finish-game-btn');
                if (finishBtn) {
                    finishBtn.onclick = function() {
                        // Animation fade out
                        modal.style.opacity = '0';

                        setTimeout(() => {
                            window.location.href = "{{ route('main') }}";
                        }, 300);
                    };
                } else {
                    console.error('finish-game-btn not found!');
                }
            }
        });
    </script>

    <style>
        /* Intro Modal Animation */
        .animate-modal-show .modal-backdrop {
            animation: backdropFadeIn 0.3s ease-out forwards;
        }

        .animate-modal-show .modal-content {
            animation: contentSlideIn 0.4s ease-out 0.15s both;
        }

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
                transform: scale(0.3);
            }
        }

        .modal-content {
            opacity: 0;
            transform: scale(0.8);
        }

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

        #game-content {
            opacity: 1;
            transition: all 0.3s ease-out;
        }

        /* Hover effects */
        .text-option:hover:not(.matched) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(91, 33, 182, 0.4);
        }

        .image-option:hover:not(.matched) {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);
        }

        /* Prevent pointer events on matched items */
        .matched {
            pointer-events: none;
        }

        /* Ensure ring doesn't interfere with layout */
        .text-option,
        .image-option {
            transition: all 0.3s ease;
        }

        /* Button hover effects */
        button:hover {
            transform: translateY(-1px);
        }

        /* Complete Modal Styling */
        #complete-overlay {
            transition: opacity 0.3s ease-in-out;
        }

        #complete-overlay .bg-white {
            transform: scale(0.95);
            transition: transform 0.3s ease-in-out;
        }

        #complete-overlay:not(.opacity-0) .bg-white {
            transform: scale(1);
        }

        /* Progress Bar Styling */
        #progress-bar {
            box-shadow: 0 2px 4px rgba(99, 102, 241, 0.3);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        #progress-bar.animate-pulse {
            animation: progressPulse 1s ease-in-out infinite;
        }

        @keyframes progressPulse {

            0%,
            100% {
                box-shadow: 0 2px 4px rgba(99, 102, 241, 0.3);
            }

            50% {
                box-shadow: 0 4px 8px rgba(99, 102, 241, 0.6);
                transform: scaleY(1.1);
            }
        }

        /* Progress container hover effect */
        .progress-container:hover #progress-bar {
            box-shadow: 0 4px 8px rgba(99, 102, 241, 0.4);
        }

        /* Shake animation for wrong matches */
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }
    </style>
@endsection
