 {{-- นี่คือหน้า layout/game/script/3/index.blade.php --}}
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const introModal = document.getElementById('intro-modal');
            const gameContent = document.getElementById('game-content');
            const startGameBtn = document.getElementById('start-game-btn');

            setTimeout(() => {
                introModal.classList.add('animate-modal-show');
                gameContent.classList.add('game-blur');
            }, 100);

            startGameBtn.addEventListener('click', function() {
                introModal.classList.remove('animate-modal-show');
                introModal.classList.add('animate-modal-fade-out');

                setTimeout(() => {
                    introModal.style.display = 'none';
                    gameContent.classList.remove('game-blur');
                    gameContent.classList.add('animate-unblur');
                }, 300);
            });

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
                            window.location.href = "{{ route('game_4_1') }}";
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


        .animate-modal-show .modal-content {
            animation: contentZoomIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        .animate-modal-hide {
            animation: modalHide 0.3s ease-out forwards;
        }

        .animate-modal-fade-out {
            animation: backdropFadeOut 0.3s ease-out forwards;
        }

        .animate-modal-fade-out .modal-content {
            animation: contentScaleOut 0.3s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes contentZoomIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.05);
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
            transform: scale(0.3);
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
    </style>