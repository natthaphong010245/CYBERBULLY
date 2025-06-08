@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 14</h3>
            <p class="text-lg text-indigo-800 mb-4">การใช้อินเตอร์เน็ตอย่างปลอดภัย ด้วยหลัก C.O.N.N.E.C.T</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="bg-white" id="game-content">
        <div class="card-container space-y-6 px-2 pb-0">
            <div class="text-center mb-4">
                <h2 class="text-xl font-bold text-indigo-800">การใช้อินเตอร์เน็ตอย่างปลอดภัย ด้วยหลัก <h2 class="text-2xl font-bold text-indigo-800">C.O.N.N.E.C.T</h2></h2>
            </div>
        
        <!-- Letters Grid -->
        <div class="grid grid-cols-2 gap-3 max-w-sm mx-auto">
            <!-- C -->
            <div class="letter-card" data-letter="c" data-selected="false">
                <div class="bg-white rounded-2xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200" style="box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/game/14/c.png') }}" alt="Letter C" class="w-full h-32 object-contain">
                </div>
            </div>
            
            <!-- e -->
            <div class="letter-card" data-letter="o" data-selected="false">
                <div class="bg-white rounded-2xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200" style="box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/game/14/o.png') }}" alt="Letter O" class="w-full h-32 object-contain">
                </div>
            </div>
            
            <!-- N -->
            <div class="letter-card" data-letter="n1" data-selected="false">
                <div class="bg-white rounded-2xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200" style="box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/game/14/n.png') }}" alt="Letter N" class="w-full h-32 object-contain">
                </div>
            </div>
            
            <!-- N -->
            <div class="letter-card" data-letter="n2" data-selected="false">
                <div class="bg-white rounded-2xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200" style="box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/game/14/n.png') }}" alt="Letter N" class="w-full h-32 object-contain">
                </div>
            </div>
            
            <!-- E -->
            <div class="letter-card" data-letter="e" data-selected="false">
                <div class="bg-white rounded-2xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200" style="box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/game/14/e.png') }}" alt="Letter E" class="w-full h-32 object-contain">
                </div>
            </div>
            
            <!-- C -->
            <div class="letter-card" data-letter="c2" data-selected="false">
                <div class="bg-white rounded-2xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200" style="box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/game/14/c.png') }}" alt="Letter C" class="w-full h-32 object-contain">
                </div>
            </div>
        </div>
        
        <!-- T (Bottom Center) -->
        <div class="flex justify-center mt-4 mb-0">
            <div class="letter-card" data-letter="t" data-selected="false" style="width: calc((100% - 0.75rem) / 2); max-width: calc((320px - 0.75rem) / 2);">
                <div class="bg-white rounded-2xl p-6 cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200" style="box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/game/14/t.png') }}" alt="Letter T" class="w-full h-32 object-contain">
                </div>
            </div>
        </div>
    </div>
    </div>
    
   <!-- Letter Detail Modal -->
<div id="letter-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
    <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
        <div class="mb-6">
            <!-- Letter Image -->
            <div class="mb-4">
                <img id="modal-letter-image" src="" alt="" class="w-32 h-auto mx-auto object-contain">
            </div>
            
            <h3 id="modal-letter-title" class="text-2xl font-bold text-indigo-800 mb-2"></h3>
            
            <p id="modal-letter-description" class="text-indigo-800 text-xl"></p>
        </div>
        
        <button id="continue-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
            ถัดไป
        </button>
    </div>
</div>

    <!-- Summary Modal -->
    <div id="summary-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 text-center">
            <div class="mb-2">
                <h3 class="text-2xl font-bold text-indigo-800 mb-4">การใช้อินเตอร์เน็ตอย่างปลอดภัย</h3>
                
                <!-- Summary List -->
                <div class="space-y-4 flex flex-col items-center">
                    <img src="{{ asset('images/game/14/internet_safely.png') }}" alt="C" class="w-11/12 h-auto">
                </div>
                
                <p class="text-indigo-800 font-semibold text-lg mt-6">สิ้นสุดความท้าทาย</p>
            </div>
            
            <button id="finish-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                จบ
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
            const letterCards = document.querySelectorAll('.letter-card');
            const letterModal = document.getElementById('letter-modal');
            const summaryModal = document.getElementById('summary-modal');
            const modalImage = document.getElementById('modal-letter-image');
            const modalTitle = document.getElementById('modal-letter-title');
            const modalDescription = document.getElementById('modal-letter-description');
            const continueBtn = document.getElementById('continue-btn');
            const finishBtn = document.getElementById('finish-btn');
            
            let selectedLetters = new Set();
            let currentLetter = '';
            
            // Letter data
            const letterData = {
                'c': {
                    title: 'Cyber Security',
                    description: 'ใช้อย่างปลอดภัย',
                    image: '{{ asset("images/game/14/c.png") }}'
                },
                'o': {
                    title: 'Online Empath',
                    description: 'ใส่ใจผู้อื่น',
                    image: '{{ asset("images/game/14/o.png") }}'
                },
                'n1': {
                    title: 'Netiquette',
                    description: 'ใช้อย่างมีสุดส่วน',
                    image: '{{ asset("images/game/14/n.png") }}'
                },
                'n2': {
                    title: 'Notification',
                    description: 'ปิดการแจ้งเตือน',
                    image: '{{ asset("images/game/14/n.png") }}'
                },
                'e': {
                    title: 'Exploration',
                    description: 'สำรวจเพื่อแนะนำ',
                    image: '{{ asset("images/game/14/e.png") }}'
                },
                'c2': {
                    title: 'Collect & Connect',
                    description: 'แกน-แกร์ ผ่อมบกร้',
                    image: '{{ asset("images/game/14/c.png") }}'
                },
                't': {
                    title: 'Two-Step Verification',
                    description: 'เปิดโครี่ทำกิดให้ช่วย',
                    image: '{{ asset("images/game/14/t.png") }}'
                }
            };
            
            // Handle letter card clicks
            letterCards.forEach(card => {
                card.addEventListener('click', function() {
                    const letter = this.getAttribute('data-letter');
                    currentLetter = letter;
                    showLetterModal(letter);
                });
            });
            
            // Handle continue button
            continueBtn.addEventListener('click', function() {
                hideModal(letterModal);
                
                // Mark letter as selected
                selectedLetters.add(currentLetter);
                updateCardAppearance(currentLetter);
                
                // Check if all letters are selected
                if (selectedLetters.size === 7) {
                    setTimeout(() => {
                        showSummaryModal();
                    }, 500);
                }
            });
            
            // Handle finish button
            finishBtn.addEventListener('click', function() {
                hideModal(summaryModal);
                setTimeout(() => {
                    window.location.href = "{{ route('main') }}";
                }, 500);
            });
            
            function showLetterModal(letter) {
                const data = letterData[letter];
                
                modalImage.src = data.image;
                modalImage.alt = data.title;
                modalTitle.textContent = data.title;
                modalDescription.textContent = data.description;
                
                letterModal.classList.remove('hidden');
                letterModal.classList.add('animate-fadeIn');
            }
            
            function showSummaryModal() {
                summaryModal.classList.remove('hidden');
                summaryModal.classList.add('animate-fadeIn');
            }
            
            function hideModal(modal) {
                modal.classList.remove('animate-fadeIn');
                modal.classList.add('animate-fadeOut');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('animate-fadeOut');
                }, 500);
            }
            
            function updateCardAppearance(letter) {
                const card = document.querySelector(`[data-letter="${letter}"]`);
                const cardInner = card.querySelector('div');
                
                // Change border to purple
                cardInner.classList.remove('border-transparent', 'hover:border-indigo-200');
                cardInner.classList.add('border-purple-500');
                
                // Mark as selected
                card.setAttribute('data-selected', 'true');
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
        #letter-modal .bg-white,
        #summary-modal .bg-white {
            animation: modalSlideIn 0.5s ease-in-out forwards;
        }
        
        #letter-modal.animate-fadeOut .bg-white,
        #summary-modal.animate-fadeOut .bg-white {
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
        
        /* Letter card hover effects */
        .letter-card:hover div {
            transform: translateY(-2px);
        }
        
        .letter-card:active div {
            transform: translateY(0);
        }
        
        /* Selected card styling */
        .letter-card[data-selected="true"] div {
            border-color: #8b5cf6 !important;
            border-width: 2px;
        }
        
        /* Remove any borders or outlines */
        img {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
        
        @media (max-width: 640px) {
            .grid {
                gap: 2rem;
                padding: 0;
            }
            
            .letter-card div {
                padding: 1rem;
            }
            
            .letter-card img {
                height: 6rem;
            }
            
            #letter-modal .bg-white,
            #summary-modal .bg-white {
                margin: 1rem;
                max-width: calc(100% - 2rem);
            }
            
            .card-container {
                padding: 1rem 0.5rem;
            }
            
            /* Adjust text size for mobile */
            h2 {
                font-size: 1.125rem;
            }
            
            h3 {
                font-size: 1.375rem;
            }
            
            .text-base {
                font-size: 1rem;
            }
            
            .text-lg {
                font-size: 1.125rem;
            }
        }
    </style>
@endsection