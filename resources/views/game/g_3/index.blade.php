@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 3</h3>
            <p class="text-lg text-indigo-800 mb-2">แบบไหนที่เรียกว่าเป็นการรังแกทางไซเบอร์</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความท้าทายกันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-2">
            <h2 class="text-xl font-bold text-indigo-800">แบบไหนที่เรียกว่าเป็นการรังแกทางไซเบอร์</h2>
        </div>
        
        <div class="grid grid-cols-2 gap-4" id="card-grid">
            <div class="card-option" data-card="ant" data-correct="false">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/ant.png') }}" alt="ANT" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANT</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/incorrect.png') }}" alt="Incorrect" class="w-auto h-28">
                    </div>
                </div>
            </div>
            
            <div class="card-option" data-card="anyplace" data-correct="true">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/place_time.png') }}" alt="place&time" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANY PLACE ANY TIME</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-auto h-28">
                    </div>
                </div>
            </div>
            
            <div class="card-option" data-card="anonymous" data-correct="true">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/anonymous.png') }}" alt="Anonymous" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANONYMOUNS</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/correct.png') }}" alt="Correct" class="w-auto h-28">
                    </div>
                </div>
            </div>
            
            <div class="card-option" data-card="animal" data-correct="false">
                <div class="border rounded-lg p-2 border-indigo-200 h-full flex flex-col items-center transition-colors cursor-pointer relative">
                    <div class="flex-grow w-full flex items-center justify-center">
                        <img src="{{ asset('images/game/3/animals.png') }}" alt="Animals" class="h-52 object-contain card-image">
                    </div>
                    <div class="text-center text-indigo-700 font-bold mt-2">ANIMAL</div>
                    <div class="marker-overlay hidden absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('images/material/incorrect.png') }}" alt="Incorrect" class="w-auto h-28">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="feedback-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4">
            <div id="info-content" class="text-center">
            </div>
            <div class="mt-6 text-center">
                <button id="continue-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors">
                    ถัดไป
                </button>
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
            const cardGrid = document.getElementById('card-grid');
            const cards = Array.from(cardGrid.children);
            
            for (let i = cards.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                cardGrid.appendChild(cards[j]);
            }
            
            let correctSelections = 0;
            const requiredSelections = 2;
            let selectedCards = [];
            
            document.querySelectorAll('.card-option').forEach(card => {
                card.addEventListener('click', function() {
                    const isCorrect = this.getAttribute('data-correct') === 'true';
                    const cardType = this.getAttribute('data-card');
                    
                    if (selectedCards.includes(cardType)) {
                        return;
                    }
                    
                    if (isCorrect) {
                        this.querySelector('div').classList.add('border-green-500', 'border-2');
                        correctSelections++;
                        selectedCards.push(cardType);
                        
                        const marker = this.querySelector('.marker-overlay');
                        marker.classList.remove('hidden');
                        marker.classList.add('animate-fadeIn');
                        
                        setTimeout(() => {
                            showInfoModal(cardType, this);
                        }, 800);
                    } else {
                        this.querySelector('div').classList.add('border-red-500', 'border-2');
                        
                        this.querySelector('.card-image').classList.add('opacity-50');
                        const textElement = this.querySelector('.text-indigo-700');
                        textElement.classList.add('text-gray-500');
                        textElement.classList.remove('text-indigo-700');
                        
                        const marker = this.querySelector('.marker-overlay');
                        marker.classList.remove('hidden');
                        marker.classList.add('animate-fadeIn');
                    }
                });
            });
            
            function showInfoModal(cardType, cardElement) {
                const overlay = document.getElementById('feedback-overlay');
                const content = document.getElementById('info-content');
                const continueBtn = document.getElementById('continue-btn');
                
                if (cardType === 'anonymous') {
                    content.innerHTML = `
                        <img src="{{ asset('images/game/3/anonymous.png') }}" alt="Anonymous" class="w-auto h-48 mx-auto mb-4">
                        <h3 class="text-xl font-bold text-indigo-800 mb-2">ANONYMOUS</h3>
                        <p class="text-gray-700">ความเป็นนิรนาม การไม่ระบุตัวตน เราไม่รู้จักว่าคือใครขณะเราทำออนไลน์ เป็นใครอำนาจของทุกคนในพื้นที่ออนไลน์เท่าเทียมกัน</p>
                    `;
                } else if (cardType === 'anyplace') {
                    content.innerHTML = `
                        <img src="{{ asset('images/game/3/place_time.png') }}" alt="Any place any time" class="w-auto h-48 mx-auto mb-4">
                        <h3 class="text-xl font-bold text-indigo-800 mb-2">ANY PLACE ANY TIME</h3>
                        <p class="text-gray-700">เกิดได้ทุกที่ ทุกเวลา 24/7 ที่ไหนก็ได้ในโลก เพียงแค่มีอินเตอร์เน็ตเชื่อมต่อมีการแชร์ มีการแคป มีการส่งต่อ แพร่กระจายไปอย่างรวดเร็ว(virality)</p>
                    `;
                }
                
                overlay.classList.remove('hidden');
                overlay.classList.add('animate-fadeIn');
                
                let shouldNavigateHome = correctSelections >= requiredSelections;
                
                continueBtn.onclick = function() {
                    overlay.classList.remove('animate-fadeIn');
                    overlay.classList.add('animate-fadeOut');
                    
                    setTimeout(() => {
                        overlay.classList.add('hidden');
                        overlay.classList.remove('animate-fadeOut');
                        
                        if (shouldNavigateHome) {
                            window.location.href = "{{ route('main') }}";
                        }
                    }, 500);
                };
            }
        });
    </script>
    
    <style>
        .marker-overlay {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 0.5rem;
            z-index: 5;
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out forwards;
        }
        
        .animate-fadeOut {
            animation: fadeOut 0.5s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }

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