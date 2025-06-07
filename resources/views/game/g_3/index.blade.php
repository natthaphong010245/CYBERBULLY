@extends('layouts.game.index')

@section('content')
    <div class="card-container space-y-6 px-6 md:px-0">
        <div class="text-center mb-2">
            <h2 class="text-lg font-bold text-indigo-800">แบบไหนที่เรียกว่า</h2>
            <h2 class="text-lg font-bold text-indigo-800">เป็นการกลั่นแกล้งทางไซเบอร์</h2>
            <p class="text-sm text-indigo-700 mt-2">มี 2 ตัวเลือกที่ถูก</p>
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
                        <img src="{{ asset('images/game/3/anonymous.jpg') }}" alt="Anonymous" class="w-auto h-48 mx-auto mb-4">
                        <h3 class="text-xl font-bold text-indigo-800 mb-2">ANONYMOUS</h3>
                        <p class="text-gray-700">ความเป็นนิรนาม การไม่ระบุตัวตน เราไม่รู้จักว่าคือใครขณะเราทำออนไลน์ เป็นใครอำนาจของทุกคนในพื้นที่ออนไลน์เท่าเทียมกัน</p>
                    `;
                } else if (cardType === 'anyplace') {
                    content.innerHTML = `
                        <img src="{{ asset('images/game/3/place&time.png') }}" alt="Any place any time" class="w-auto h-48 mx-auto mb-4">
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
    </style>
@endsection