@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 6</h3>
            <p class="text-lg text-indigo-800 mb-4">พบปัญหา สิ่งที่เขาได้ยินได้ทุกข์ทรมาน หรือกลั่นแกล้งบนโลกออนไลน์ที่ผ่านมาได้เลย</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="bg-white min-h-0" id="game-content"> <!-- เปลี่ยนจาก min-h-screen เป็น min-h-0 -->
        <div class="card-container space-y-2 px-4 py-2 pb-4"> <!-- เพิ่ม pb-4 เพื่อควบคุม bottom padding -->
            <!-- Header -->
            <div class="text-center mb-6"> <!-- ลดจาก mb-8 เป็น mb-6 -->
                <h2 class="text-xl sm:text-xl font-bold text-indigo-800 leading-tight px-4">
                    พบปัญหา สิ่งที่เขาได้ยินได้ทุกข์ทรมาน หรือกลั่นแกล้งบนโลกออนไลน์ที่ผ่านมาได้เลย
                </h2>
            </div>

            <!-- Main Content Area -->
            <div class="flex flex-col items-center space-y-2">
                <!-- Circular Message Display Area -->
                <div class="relative w-80 h-80 sm:w-96 sm:h-96">
                    <!-- Center Image (ลบกรอบวงกลมออกแล้ว) -->
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/game/6/stop_cyberbullying.png') }}" alt="Character" class="w-28 h-28 sm:w-20 sm:h-20 object-contain">
                        </div>
                    </div>

                    <!-- Messages Container -->
                    <div id="messages-container" class="absolute inset-0">
                        <!-- Messages will be dynamically positioned here -->
                    </div>
                </div>

                <!-- Input Section -->
                <div class="w-full max-w-lg mr-4 ml-4 mt-8">
                    <div class="relative flex items-center border-2 border-gray-300 rounded-2xl p-2 mb-3"> <!-- ลดจาก mb-4 เป็น mb-3 -->
                        <input 
                            type="text" 
                            id="message-input" 
                            placeholder="CYBERBULLYING" 
                            class="flex-1 px-6 py-2 bg-transparent outline-none focus:outline-none text-gray-700 placeholder-gray-400 text-lg"
                            maxlength="20"
                        >
                        <button 
                            id="add-message-btn" 
                            class="bg-[#5F58C9] text-white p-3 rounded-full transition-colors  "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Next Button - Right aligned -->
                    <div class="flex justify-end mt-8 mr-2"> 
                        <button 
                            id="next-btn" 
                            class="bg-[#929AFF] text-white font-medium py-3 px-8 rounded-2xl transition-colors hover:bg-[#7B85FF] disabled:bg-gray-300 disabled:cursor-not-allowed shadow-lg"
                            disabled
                        >
                            ถัดไป
                        </button>
                    </div>
                </div>
            </div>
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
            const messageInput = document.getElementById('message-input');
            const addMessageBtn = document.getElementById('add-message-btn');
            const nextBtn = document.getElementById('next-btn');
            const messagesContainer = document.getElementById('messages-container');
            
            let messages = [];
            const maxMessages = 8;
            
            // Add message function
            function addMessage() {
                const messageText = messageInput.value.trim();
                
                if (messageText === '' || messages.length >= maxMessages) {
                    return;
                }
                
                messages.push(messageText);
                messageInput.value = '';
                updateMessagesDisplay();
                updateUI();
            }
            
            // Update messages display in circular pattern
            function updateMessagesDisplay() {
                messagesContainer.innerHTML = '';
                
                const containerWidth = messagesContainer.clientWidth;
                const containerHeight = messagesContainer.clientHeight;
                const centerX = containerWidth / 2;
                const centerY = containerHeight / 2;
                const radius = Math.min(containerWidth, containerHeight) * 0.35;
                
                messages.forEach((message, index) => {
                    let angle;
                    
                    // First arrange in main positions (top, right, bottom, left), then fill in between
                    if (index === 0) {
                        angle = -90; // Top (12 o'clock)
                    } else if (index === 1) {
                        angle = 0; // Right (3 o'clock)
                    } else if (index === 2) {
                        angle = 90; // Bottom (6 o'clock)
                    } else if (index === 3) {
                        angle = 180; // Left (9 o'clock)
                    } else {
                        // For additional messages, fill in the gaps
                        const mainPositions = [-90, 0, 90, 180]; // Main 4 positions
                        const gaps = [-45, 45, 135, -135]; // Between main positions
                        const extraPositions = [-67.5, -22.5, 22.5, 67.5, 112.5, 157.5]; // More detailed positions
                        
                        if (index < 8) {
                            angle = gaps[index - 4]; // Fill first 4 gaps
                        } else {
                            angle = extraPositions[index - 8]; // Fill remaining positions
                        }
                    }
                    
                    const radian = (angle * Math.PI) / 180;
                    
                    const x = centerX + radius * Math.cos(radian);
                    const y = centerY + radius * Math.sin(radian);
                    
                    const messageElement = document.createElement('div');
                    messageElement.className = 'absolute transform -translate-x-1/2 -translate-y-1/2 bg-[#929AFF]/10 text-[#5F58C9] px-4 py-2 rounded-lg text-sm font-medium shadow-md border border-[#5F58C9]/75 animate-fadeIn cursor-pointer hover:bg-[#929AFF]/20 transition-colors';
                    messageElement.style.left = x + 'px';
                    messageElement.style.top = y + 'px';
                    messageElement.textContent = message;
                    
                    // Add click to remove functionality (without X button)
                    messageElement.onclick = () => {
                        removeMessage(index);
                    };
                    
                    messagesContainer.appendChild(messageElement);
                });
            }
            
            // Remove message function
            function removeMessage(index) {
                messages.splice(index, 1);
                updateMessagesDisplay();
                updateUI();
            }
            
            // Update UI elements
            function updateUI() {
                // Enable/disable add button
                addMessageBtn.disabled = messages.length >= maxMessages;
                
                // Enable next button if at least one message is added
                nextBtn.disabled = messages.length === 0;
            }
            
            // Event listeners
            addMessageBtn.addEventListener('click', addMessage);
            
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    addMessage();
                }
            });
            
            nextBtn.addEventListener('click', function() {
                // Save messages data (you can send to server here)
                console.log('Messages to save:', messages);
                
                // Navigate to next page directly without alert
                window.location.href = "{{ route('main') }}";
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (messages.length > 0) {
                    updateMessagesDisplay();
                }
            });
            
            // Initialize
            updateUI();
        });
    </script>
    
    <style>
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            0% { 
                opacity: 0; 
                transform: translate(-50%, -50%) scale(0.8); 
            }
            100% { 
                opacity: 1; 
                transform: translate(-50%, -50%) scale(1); 
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
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .card-container {
                padding: 0.75rem; /* ลดจาก 1rem */
                padding-bottom: 1rem; /* กำหนด bottom padding เฉพาะ */
            }
            
            h2 {
                font-size: 1rem;
                padding: 0 1rem;
                margin-bottom: 1rem; /* ลด margin-bottom */
            }
            
            #messages-container {
                font-size: 0.75rem;
            }
            
            #messages-container div {
                padding: 0.5rem 0.5rem;
                max-width: 120px;
                font-size: 1rem;
                text-align: center;
                line-height: 1.2;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
        
        /* Custom message styling */
        #messages-container div {
            max-width: 150px;
            white-space: nowrap;
            text-align: center;
            transition: all 0.3s ease;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        #messages-container div:hover {
            transform: translate(-50%, -50%) scale(1.05);
            z-index: 10;
            max-width: 200px;
            white-space: normal;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        /* Input focus styling - ลบขอบออก */
        #message-input:focus {
            outline: none;
            box-shadow: none;
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
        
        /* ลดพื้นที่ว่างด้านล่างเพิ่มเติม */
        .card-container {
            margin-bottom: 0 !important;
        }
        
        /* สำหรับ parent container */
        .bg-white {
            padding-bottom: 1rem;
        }
    </style>
@endsection