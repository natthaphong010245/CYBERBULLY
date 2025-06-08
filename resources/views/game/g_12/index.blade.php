@extends('layouts.game.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">ความรู้เกี่ยวกับพฤติกรรมการรังแกกัน</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 12</h3>
            <p class="text-lg text-indigo-800 mb-4">เวลาเจอปัญหานักเรียนจะรับมือการรังแกอย่างไร?</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-8 pl-6 pr-6">
            <h2 class="text-xl font-bold text-indigo-800">เวลาเจอปัญหานักเรียนจะรับมือการรังแกอย่างไร?</h2>
        </div>
        
        <!-- Animal Choice Grid -->
        <div class="grid grid-cols-2 gap-3 w-full max-w-4xl mx-auto px-4">
            <!-- Tiger -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4" 
                 style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="tiger">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/tiger.png') }}" alt="Tiger" class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">เสือ</p>
                </div>
            </div>
            
            <!-- Fox -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4" 
                 style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="fox">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/fox.png') }}" alt="Fox" class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">จิ้งจอก</p>
                </div>
            </div>
            
            <!-- Butterfly -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4" 
                 style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="butterfly">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/butterfly.png') }}" alt="Butterfly" class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">ผีเสื้อ</p>
                </div>
            </div>
            
            <!-- Rabbit -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4" 
                 style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="rabbit">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/rabbit.png') }}" alt="Rabbit" class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">กระต่าย</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Animal Modal -->
    <div id="animal-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <!-- Animal Image -->
                <div class="mb-4">
                    <img id="modal-animal-image" src="" alt="" class="w-32 h-32 mx-auto object-contain">
                </div>
                
                <!-- Animal Name -->
                <h3 id="modal-animal-name" class="text-xl font-bold text-indigo-800 mb-2"></h3>
                
                <!-- Animal Description -->
                <p id="modal-animal-description" class="text-indigo-800 text-sm leading-relaxed"></p>
            </div>
            
            <button id="continue-btn" class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                ถัดไป
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
            const animalCards = document.querySelectorAll('.animal-card');
            const animalModal = document.getElementById('animal-modal');
            const modalImage = document.getElementById('modal-animal-image');
            const modalName = document.getElementById('modal-animal-name');
            const modalDescription = document.getElementById('modal-animal-description');
            const continueBtn = document.getElementById('continue-btn');
            
            // Animal data
            const animalData = {
                tiger: {
                    name: 'เสือ',
                    description: 'ทำมาทำกลับไม่โกง',
                    image: '{{ asset("images/game/12/tiger.png") }}',
                    bold: true
                },
                fox: {
                    name: 'จิ้งจอก',
                    description: 'คิดวนเวียนในแง่ลบโทษ\tและตำหนิตัวเอง',
                    image: '{{ asset("images/game/12/fox.png") }}'
                },
                butterfly: {
                    name: 'ผีเสื้อ',
                    description: 'หลีกเลี่ยง\tลอยตัว \tไม่สนใจการรังแก',
                    image: '{{ asset("images/game/12/butterfly.png") }}'
                },
                rabbit: {
                    name: 'กระต่าย',
                    description: 'นิ่ง\tช็อค\tไปไม่เป็น\tไม่บอกใครด้วยว่าโดนรังแก',
                    image: '{{ asset("images/game/12/rabbit.png") }}'
                }
            };
            
            // Handle animal card clicks
            animalCards.forEach(card => {
                card.addEventListener('click', function() {
                    const animalType = this.getAttribute('data-animal');
                    showAnimalModal(animalType);
                });
            });
            
            // Handle continue button
            continueBtn.addEventListener('click', function() {
                hideModal();
                setTimeout(() => {
                    window.location.href = "{{ route('main') }}";
                }, 500);
            });
            
            function showAnimalModal(animalType) {
                const animal = animalData[animalType];
                
                modalImage.src = animal.image;
                modalImage.alt = animal.name;
                modalName.textContent = animal.name;
                modalDescription.textContent = animal.description;
                
                // Apply light font weight for all animals
                modalDescription.style.fontWeight = '300';
                
                animalModal.classList.remove('hidden');
                animalModal.classList.add('animate-fadeIn');
            }
            
            function hideModal() {
                animalModal.classList.remove('animate-fadeIn');
                animalModal.classList.add('animate-fadeOut');
                setTimeout(() => {
                    animalModal.classList.add('hidden');
                    animalModal.classList.remove('animate-fadeOut');
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
        #animal-modal .bg-white {
            animation: modalSlideIn 0.5s ease-in-out forwards;
        }
        
        #animal-modal.animate-fadeOut .bg-white {
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
        
        /* Animal card hover effects */
        .animal-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 25px rgba(0,0,0,0.15) !important;
        }
        
        .animal-card:active {
            transform: translateY(0);
            box-shadow: 0 0 15px rgba(0,0,0,0.1) !important;
        }
        
        /* Remove any borders or outlines */
        img {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
        
        /* Modal description with line breaks */
        #modal-animal-description {
            white-space: pre-line;
        }
        
        @media (max-width: 640px) {
            .grid {
                gap: 1rem;
                padding: 0 1rem;
            }
            
            .animal-card {
                padding: 1rem;
            }
            
            .animal-card img {
                width: 80px;
                height: 80px;
            }
            
            #animal-modal .bg-white {
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
            
            #modal-animal-description {
                font-size: 1rem;
            }
        }
    </style>
@endsection