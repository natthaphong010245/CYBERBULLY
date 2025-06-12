{{-- นี่คือหน้า layout/game/script/8_9_10/index.blade.php --}}
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

        // Game logic - ใช้ค่าจาก window variables
        const correctOverlay = document.getElementById('correct-overlay');
        const wrongOverlay = document.getElementById('wrong-overlay');
        const showAnswerBtn = document.getElementById('show-answer-btn');
        
        // Get next route from window variable (set by individual games)
        const nextRoute = window.gameNextRoute || "{{ route('main') }}";
        
        // Handle choice cards (for games 8 & 9)
        const correctChoice = document.querySelector('.correct-choice');
        const wrongChoice = document.querySelector('.wrong-choice');
        
        if (correctChoice && wrongChoice) {
            // Games 8 & 9 logic
            const finishCorrectBtn = document.getElementById('finish-correct-btn');
            
            correctChoice.addEventListener('click', function() {
                showCorrectModal();
            });
            
            wrongChoice.addEventListener('click', function() {
                showWrongModal();
            });
            
            // Handle finish button (from correct modal)
            finishCorrectBtn.addEventListener('click', function() {
                hideModal(correctOverlay);
                setTimeout(() => {
                    window.location.href = nextRoute;
                }, 500);
            });
        }
        
        // Handle buttons (for game 10)
        const illegalBtn = document.getElementById('illegal-btn');
        const legalBtn = document.getElementById('legal-btn');
        
        if (illegalBtn && legalBtn) {
            // Game 10 logic
            const correctContinueBtn = document.getElementById('correct-continue-btn');
            
            // Handle "ผิดกฎหมาย" button click (Correct Answer)
            illegalBtn.addEventListener('click', function() {
                showCorrectModal();
            });

            // Handle "ไม่ผิดกฎหมาย" button click (Wrong Answer)
            legalBtn.addEventListener('click', function() {
                showWrongModal();
            });
            
            // Handle continue button (from correct modal)
            correctContinueBtn.addEventListener('click', function() {
                hideModal(correctOverlay);
                setTimeout(() => {
                    window.location.href = nextRoute;
                }, 500);
            });
        }
        
        // Handle show answer button (from wrong modal) - shared for all games
        showAnswerBtn.addEventListener('click', function() {
            hideModal(wrongOverlay);
            setTimeout(() => {
                showCorrectModal();
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
    
    /* Choice card hover effects (for games 8 & 9) */
    .choice-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 25px rgba(0,0,0,0.15) !important;
    }
    
    .choice-card:active {
        transform: translateY(0);
        box-shadow: 0 0 15px rgba(0,0,0,0.1) !important;
    }
    
    /* Button hover effects (for game 10) */
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
        .choice-card img {
            width: 100%;
            height: 160px;
        }
        
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
        
        /* Better spacing for mobile */
        .space-y-2 > * + * {
            margin-top: 0.75rem;
        }
        
        /* Button adjustments for mobile */
        button {
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }
    }
</style>