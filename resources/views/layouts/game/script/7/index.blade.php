{{-- นี่คือหน้า layout/game/script/7/index.blade.php --}}
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
            const container = document.getElementById('mystery-container');
            const wrongOverlay = document.getElementById('wrong-overlay');
            const correctOverlay = document.getElementById('correct-overlay');
            const tryAgainBtn = document.getElementById('try-again-btn');
            const finishBtn = document.getElementById('finish-btn');
            
            let gameBoxes = [];
            let correctBoxIndex = -1;
            let gameCompleted = false;
            
            // Check if user came back from another page
            window.addEventListener('pageshow', function(event) {
                if (event.persisted || performance.navigation.type === 2) {
                    // Page was loaded from cache (back button) - refresh to randomize again
                    if (gameCompleted) {
                        window.location.reload();
                    }
                }
            });
            
            function createMysteryBoxes() {
                // Clear container
                container.innerHTML = '';
                gameBoxes = [];
                
                // Randomly select which box will be correct (0, 1, or 2)
                correctBoxIndex = Math.floor(Math.random() * 3);
                
                // Box sizes and positions
                const boxConfigs = [
                    { size: 'w-36 h-36', position: 'top-0 left-3' },
                    { size: 'w-48 h-48', position: 'top-20 right-3' },
                    { size: 'w-44 h-44', position: 'top-80 bottom-0 left-1/2 transform -translate-x-1/2' }
                ];
                
                // Shuffle box configurations
                for (let i = boxConfigs.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [boxConfigs[i], boxConfigs[j]] = [boxConfigs[j], boxConfigs[i]];
                }
                
                // Create boxes
                for (let i = 0; i < 3; i++) {
                    const box = document.createElement('div');
                    box.className = `absolute ${boxConfigs[i].size} ${boxConfigs[i].position} cursor-pointer transition-transform hover:scale-105`;
                    box.innerHTML = `
                        <img src="{{ asset('images/game/7/mystery_box.png') }}" alt="Mystery Box" class="w-full h-full object-contain">
                    `;
                    
                    box.addEventListener('click', function() {
                        handleBoxClick(i);
                    });
                    
                    container.appendChild(box);
                    gameBoxes.push(box);
                }
            }
            
            function handleBoxClick(boxIndex) {
                // Disable all boxes to prevent multiple clicks
                gameBoxes.forEach(box => {
                    box.style.pointerEvents = 'none';
                });
                
                if (boxIndex === correctBoxIndex) {
                    // Correct answer
                    gameCompleted = true;
                    setTimeout(() => {
                        showCorrectModal();
                    }, 300);
                } else {
                    // Wrong answer
                    setTimeout(() => {
                        showWrongModal();
                    }, 300);
                }
            }
            
            function showWrongModal() {
                wrongOverlay.classList.remove('hidden');
                wrongOverlay.classList.add('animate-fadeIn');
            }
            
            function showCorrectModal() {
                correctOverlay.classList.remove('hidden');
                correctOverlay.classList.add('animate-fadeIn');
            }
            
            function resetGame() {
                // Don't change positions or which box is correct
                // Only re-enable all boxes for clicking again
                gameBoxes.forEach(box => {
                    box.style.pointerEvents = 'auto';
                });
            }
            
            // Event listeners
            tryAgainBtn.addEventListener('click', function() {
                wrongOverlay.classList.remove('animate-fadeIn');
                wrongOverlay.classList.add('animate-fadeOut');
                
                setTimeout(() => {
                    wrongOverlay.classList.add('hidden');
                    wrongOverlay.classList.remove('animate-fadeOut');
                    resetGame();
                }, 500);
            });
            
            finishBtn.addEventListener('click', function() {
                correctOverlay.classList.remove('animate-fadeIn');
                correctOverlay.classList.add('animate-fadeOut');
                
                setTimeout(() => {
                    window.location.href = "{{ route('game_8') }}";
                }, 500);
            });
            
            // Initialize game
            createMysteryBoxes();
        });
    </script>
    
    <style>
        /* Modal overlay animations */
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
        #wrong-overlay .bg-white,
        #correct-overlay .bg-white {
            animation: modalSlideIn 0.5s ease-in-out forwards;
        }
        
        #wrong-overlay.animate-fadeOut .bg-white,
        #correct-overlay.animate-fadeOut .bg-white {
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
        
        #mystery-container {
            position: relative;
            width: 100%;
            height: 200px;
        }
        
        @media (max-width: 640px) {
            #mystery-container {
                height: 200px;
            }
            
            .w-32 { width: 6rem; height: 6rem; }
            .w-36 { width: 7rem; height: 7rem; }
            .w-40 { width: 8rem; height: 8rem; }
        }
    </style>