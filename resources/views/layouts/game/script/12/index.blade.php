{{-- นี่คือหน้า layout/game/script/12/index.blade.php --}}
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
                    window.location.href = "{{ route('game_13') }}";
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