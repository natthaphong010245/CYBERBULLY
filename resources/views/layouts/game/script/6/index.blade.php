{{-- นี่คือหน้า layout/game/script/6/index.blade.php --}}
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
                window.location.href = "{{ route('game_7') }}";
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