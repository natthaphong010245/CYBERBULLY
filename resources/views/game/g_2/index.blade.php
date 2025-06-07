@extends('layouts.game.index')

@section('content')
    <div class="card-container space-y-6 px-8 md:px-0">
        <div class="text-center">
            <h2 class="text-lg font-bold text-indigo-800">พฤติกรรมแบบนี้เป็นการรังแกรุมแบบไหนกันนะ</h2>
            <p class="text-sm text-indigo-700 mt-2">ลากตัวเลือกไปใส่ในช่องว่าง</p>
        </div>

        <!-- Sun -->
        <div class="flex justify-center">
            <div class="w-20 h-20 sun-container">
                <img src="{{ asset('images/material/sun.png') }}" alt="Sun" class="w-full h-full object-contain">
            </div>
        </div>

        <!-- Answer Clouds Area -->
        <div id="answer-clouds-container" class="relative min-h-80 mb-2">
            <!-- Answer clouds will be positioned here -->
        </div>

        <!-- Drop Zones -->
        <div class="text-center mb-2">
            <p class="text-sm text-gray-500">คำตอบ</p>
        </div>
        <div class="flex justify-center space-x-4 mb-6" id="drop-zones-container">
            <div class="drop-zone w-36 h-24 flex items-center justify-center relative" data-zone="0">
                <img src="{{ asset('images/material/cloud.png') }}" alt="Empty Cloud" class="w-32 h-22 opacity-30">
            </div>
            <div class="drop-zone w-36 h-24 flex items-center justify-center relative" data-zone="1">
                <img src="{{ asset('images/material/cloud.png') }}" alt="Empty Cloud" class="w-32 h-22 opacity-30">
            </div>
            <div class="drop-zone w-36 h-24 flex items-center justify-center relative" data-zone="2">
                <img src="{{ asset('images/material/cloud.png') }}" alt="Empty Cloud" class="w-32 h-22 opacity-30">
            </div>
        </div>
    </div>

    <!-- Correct Answer Modal -->
    <div id="correct-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-24 h-24">
                </div>
                <h3 class="text-lg font-bold text-green-600 mb-2">คำตอบถูกต้อง</h3>
                <p class="text-green-600">ไปเลือกคำตอบให้ครบทุกช่องกันเลย</p>
            </div>
            <button id="continue-correct-btn"
                class="bg-green-500 text-white font-medium py-2 px-6 rounded-lg transition-colors hover:bg-green-600">
                ถัดไป
            </button>
        </div>
    </div>

    <!-- Wrong Answer Modal -->
    <div id="wrong-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="{{ asset('images/material/incorrect.png') }}" alt="Wrong" class="w-24 h-24">
                </div>
                <h3 class="text-lg font-bold text-red-600 mb-2">คำตอบยังไม่ถูกต้อง</h3>
                <p class="text-red-600">กรุณาเลือกคำตอบอีกครั้ง</p>
            </div>
            <button id="try-again-wrong-btn" class="text-white font-medium py-2 px-6 rounded-lg transition-colors"
                style="background-color: #DD2F2F;" onmouseover="this.style.backgroundColor='#B82626'"
                onmouseout="this.style.backgroundColor='#DD2F2F'">
                อีกครั้ง
            </button>
        </div>
    </div>

    <!-- Complete Game Modal -->
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
            const answerCloudsContainer = document.getElementById('answer-clouds-container');
            const dropZonesContainer = document.getElementById('drop-zones-container');
            const correctOverlay = document.getElementById('correct-overlay');
            const wrongOverlay = document.getElementById('wrong-overlay');
            const completeOverlay = document.getElementById('complete-overlay');

            const correctAnswers = ['เจตนา', 'เจ็บปวด', 'จงใจทำซ้ำ'];
            const wrongAnswers = ['จิ๊จ๊ะ', 'จ๊ะจ๋า'];
            const allAnswers = [...correctAnswers, ...wrongAnswers];

            // Map answers to image files
            const answerImages = {
                'เจตนา': 'images/game/2/intent.png',
                'เจ็บปวด': 'images/game/2/painful.png',
                'จงใจทำซ้ำ': 'images/game/2/intentionally_repetitive.png',
                'จิ๊จ๊ะ': 'images/game/2/jijja.png',
                'จ๊ะจ๋า': 'images/game/2/jaja.png'
            };

            let completedZones = 0;
            let draggedElement = null;
            let draggedOriginalPosition = null;
            let touchOffset = {
                x: 0,
                y: 0
            };
            let isDragging = false;

            // Cloud positions and sizes
            const cloudPositions = [{
                position: 'top-4 left-4',
                size: 'w-32 h-auto'
            }, {
                position: 'top-10 right-20',
                size: 'w-24 h-auto'
            }, {
                position: 'top-28 left-14',
                size: 'w-28 h-auto'
            }, {
                position: 'top-32 right-6',
                size: 'w-32 h-auto'
            }, {
                position: 'top-52 left-1/2 transform -translate-x-1/2',
                size: 'w-28 h-auto'
            }];

            function shuffleArray(array) {
                const shuffled = [...array];
                for (let i = shuffled.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
                }
                return shuffled;
            }

            function createAnswerClouds() {
                answerCloudsContainer.innerHTML = '';
                const shuffledAnswers = shuffleArray(allAnswers);
                const shuffledPositions = shuffleArray(cloudPositions);

                shuffledAnswers.forEach((answer, index) => {
                    const cloud = document.createElement('div');
                    const position = shuffledPositions[index];

                    // Check if this position includes transform classes
                    const hasTransform = position.size.includes('transform');
                    const sizeClasses = position.size.replace('transform -translate-x-1/2', '').trim();

                    cloud.className =
                        `absolute ${position.position} ${sizeClasses} cursor-move answer-cloud`;
                    if (hasTransform) {
                        cloud.classList.add('transform', '-translate-x-1/2');
                    }

                    cloud.draggable = true;
                    cloud.dataset.answer = answer;
                    cloud.dataset.originalIndex = index;

                    cloud.innerHTML = `
                        <div class="relative w-full h-full">
                            <img src="{{ asset('') }}${answerImages[answer]}" alt="Cloud" class="w-full h-full">
                        </div>
                    `;

                    // Drag events
                    cloud.addEventListener('dragstart', handleDragStart);
                    cloud.addEventListener('dragend', handleDragEnd);

                    // Touch events for mobile
                    cloud.addEventListener('touchstart', handleTouchStart, {
                        passive: false
                    });
                    cloud.addEventListener('touchmove', handleTouchMove, {
                        passive: false
                    });
                    cloud.addEventListener('touchend', handleTouchEnd, {
                        passive: false
                    });

                    answerCloudsContainer.appendChild(cloud);
                });
            }

            function handleDragStart(e) {
                draggedElement = e.target.closest('.answer-cloud');
                draggedOriginalPosition = {
                    parent: draggedElement.parentNode,
                    nextSibling: draggedElement.nextSibling
                };
                e.dataTransfer.effectAllowed = 'move';
            }

            function handleDragEnd(e) {
                // Reset drag data
                setTimeout(() => {
                    draggedElement = null;
                    draggedOriginalPosition = null;
                }, 100);
            }

            // Touch event handlers for mobile
            function handleTouchStart(e) {
                e.preventDefault();
                const touch = e.touches[0];
                draggedElement = e.target.closest('.answer-cloud');

                if (!draggedElement) return;

                draggedOriginalPosition = {
                    parent: draggedElement.parentNode,
                    nextSibling: draggedElement.nextSibling
                };

                const rect = draggedElement.getBoundingClientRect();
                touchOffset.x = touch.clientX - rect.left;
                touchOffset.y = touch.clientY - rect.top;

                isDragging = true;
                draggedElement.style.zIndex = '1000';
                // Remove opacity change to avoid making cloud fade
                // draggedElement.style.opacity = '0.8';

                // Preserve existing transform and add scale
                const hasTranslate = draggedElement.classList.contains('transform');
                if (hasTranslate) {
                    draggedElement.style.transform = 'translateX(-50%) scale(1.1)';
                } else {
                    draggedElement.style.transform = 'scale(1.1)';
                }
            }

            function handleTouchMove(e) {
                if (!isDragging || !draggedElement) return;

                e.preventDefault();
                const touch = e.touches[0];

                // Update position
                const x = touch.clientX - touchOffset.x;
                const y = touch.clientY - touchOffset.y;

                draggedElement.style.position = 'fixed';
                draggedElement.style.left = x + 'px';
                draggedElement.style.top = y + 'px';
                draggedElement.style.pointerEvents = 'none';

                // Check which drop zone we're over
                const elementBelow = document.elementFromPoint(touch.clientX, touch.clientY);
                const dropZone = elementBelow?.closest('.drop-zone');

                // Remove hover effects from all zones
                document.querySelectorAll('.drop-zone img').forEach(img => {
                    img.style.opacity = '0.3';
                    img.style.filter = '';
                });

                // Add hover effect to current zone
                if (dropZone) {
                    const cloudImg = dropZone.querySelector('img');
                    if (cloudImg) {
                        cloudImg.style.opacity = '0.6';
                        cloudImg.style.filter = 'brightness(1.2)';
                    }
                }
            }

            function handleTouchEnd(e) {
                if (!isDragging || !draggedElement) return;

                e.preventDefault();
                const touch = e.changedTouches[0];
                const elementBelow = document.elementFromPoint(touch.clientX, touch.clientY);
                const dropZone = elementBelow?.closest('.drop-zone');

                // Reset visual state
                draggedElement.style.position = '';
                draggedElement.style.left = '';
                draggedElement.style.top = '';
                draggedElement.style.zIndex = '';
                // draggedElement.style.opacity = ''; // Keep original opacity
                draggedElement.style.transform = '';
                draggedElement.style.pointerEvents = '';

                // Remove hover effects
                document.querySelectorAll('.drop-zone img').forEach(img => {
                    img.style.opacity = '0.3';
                    img.style.filter = '';
                });

                if (dropZone) {
                    const answer = draggedElement.dataset.answer;

                    // Check if zone is already filled
                    if (dropZone.querySelector('.placed-cloud')) {
                        returnToOriginalPosition();
                        isDragging = false;
                        return;
                    }

                    if (correctAnswers.includes(answer)) {
                        // Correct answer
                        placeCloudInZone(draggedElement, dropZone);
                        completedZones++;

                        if (completedZones < 3) {
                            showCorrectModal();
                        } else {
                            showCompleteModal();
                        }
                    } else {
                        // Wrong answer
                        showWrongModal();
                        returnToOriginalPosition();
                    }
                } else {
                    returnToOriginalPosition();
                }

                isDragging = false;
                setTimeout(() => {
                    draggedElement = null;
                    draggedOriginalPosition = null;
                }, 100);
            }

            // Setup drop zones
            document.querySelectorAll('.drop-zone').forEach(zone => {
                zone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'move';
                    const cloudImg = this.querySelector('img');
                    if (cloudImg) {
                        cloudImg.style.opacity = '0.6';
                        cloudImg.style.filter = 'brightness(1.2)';
                    }
                });

                zone.addEventListener('dragleave', function(e) {
                    const cloudImg = this.querySelector('img');
                    if (cloudImg) {
                        cloudImg.style.opacity = '0.3';
                        cloudImg.style.filter = '';
                    }
                });

                zone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    const cloudImg = this.querySelector('img');
                    if (cloudImg) {
                        cloudImg.style.opacity = '0.3';
                        cloudImg.style.filter = '';
                    }

                    if (!draggedElement) return;

                    const answer = draggedElement.dataset.answer;
                    const zoneIndex = parseInt(this.dataset.zone);

                    // Check if zone is already filled
                    if (this.querySelector('.placed-cloud')) {
                        returnToOriginalPosition();
                        return;
                    }

                    if (correctAnswers.includes(answer)) {
                        // Correct answer
                        placeCloudInZone(draggedElement, this);
                        completedZones++;

                        if (completedZones < 3) {
                            showCorrectModal();
                        } else {
                            showCompleteModal();
                        }
                    } else {
                        // Wrong answer
                        showWrongModal();
                        returnToOriginalPosition();
                    }
                });
            });

            function placeCloudInZone(cloud, zone) {
                const answer = cloud.dataset.answer;
                // Replace the gray cloud with the answer cloud
                zone.innerHTML =
                    `<img src="{{ asset('') }}${answerImages[answer]}" alt="Cloud" class="w-32 h-22 placed-cloud">`;

                // Remove original cloud
                cloud.remove();
            }

            function returnToOriginalPosition() {
                if (draggedElement && draggedOriginalPosition) {
                    if (draggedOriginalPosition.nextSibling) {
                        draggedOriginalPosition.parent.insertBefore(draggedElement, draggedOriginalPosition
                            .nextSibling);
                    } else {
                        draggedOriginalPosition.parent.appendChild(draggedElement);
                    }
                }
            }

            function showCorrectModal() {
                correctOverlay.classList.remove('hidden');
                correctOverlay.classList.add('animate-fadeIn');
            }

            function showWrongModal() {
                wrongOverlay.classList.remove('hidden');
                wrongOverlay.classList.add('animate-fadeIn');
            }

            function showCompleteModal() {
                completeOverlay.classList.remove('hidden');
                completeOverlay.classList.add('animate-fadeIn');
            }

            function hideModal(modal) {
                modal.classList.remove('animate-fadeIn');
                modal.classList.add('animate-fadeOut');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('animate-fadeOut');
                }, 500);
            }

            // Modal button events
            document.getElementById('continue-correct-btn').addEventListener('click', function() {
                hideModal(correctOverlay);
            });

            document.getElementById('try-again-wrong-btn').addEventListener('click', function() {
                hideModal(wrongOverlay);
            });

            document.getElementById('finish-game-btn').addEventListener('click', function() {
                window.location.href = "{{ route('main') }}";
            });

            // Initialize game
            createAnswerClouds();
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

        /* Drag and drop styles */
        .answer-cloud:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease;
        }

        /* Handle clouds with existing transforms */
        .answer-cloud.transform:hover {
            transform: translateX(-50%) scale(1.05);
        }

        .answer-cloud {
            touch-action: none;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            transition: all 0.2s ease;
            transform-origin: center center;
        }

        .answer-cloud:active {
            transform: scale(0.95);
        }

        /* Handle clouds with existing transforms for active state */
        .answer-cloud.transform:active {
            transform: translateX(-50%) scale(0.95);
        }

        .drop-zone {
            transition: all 0.3s ease;
        }

        .drop-zone img {
            transition: all 0.2s ease;
        }

        /* Remove any borders or outlines */
        img {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }

        /* Sun specific styling */
        .sun-container {
            border: none;
            outline: none;
            background: transparent;
        }

        /* Custom cloud sizes */
        .w-18 {
            width: 4.5rem;
        }

        .h-9 {
            height: 2.25rem;
        }

        .h-10 {
            height: 2.5rem;
        }

        .h-12 {
            height: 3rem;
        }

        .h-13 {
            height: 3.25rem;
        }

        .h-14 {
            height: 3.5rem;
        }

        .h-18 {
            height: 4.5rem;
        }

        .h-22 {
            height: 5.5rem;
        }

        .w-20 {
            width: 5rem;
        }

        .w-22 {
            width: 5.5rem;
        }

        .w-24 {
            width: 6rem;
        }

        .w-32 {
            width: 8rem;
        }

        .w-36 {
            width: 9rem;
        }

        .h-24 {
            height: 6rem;
        }

        #answer-clouds-container {
            min-height: 280px;
        }

        @media (max-width: 640px) {
            #answer-clouds-container {
                min-height: 280px;
            }

            .drop-zone {
                width: 7rem;
                height: 5rem;
                margin: 0 0.25rem;
            }

            .drop-zone img {
                width: 6rem !important;
                height: 4rem !important;
            }

            .answer-cloud {
                font-size: 0.7rem;
            }

            #drop-zones-container {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            /* Improve touch targets on mobile */
            .answer-cloud {
                min-width: 3rem;
                min-height: 2rem;
            }

            /* Better spacing for mobile */
            .card-container {
                padding: 1rem 0.5rem;
            }
        }
    </style>
@endsection
