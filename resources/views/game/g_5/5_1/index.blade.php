@extends('layouts.game.index')

@section('content')
    <div class="card-container space-y-6 px-6 md:px-0 mb-6">
        <div class="text-center mb-2">
            <h2 class="text-2xl font-bold text-indigo-800">การกลั่นแกล้งแบบดั้งเดิม</h2>
            <h2 class="text-lg font-bold text-indigo-800">TRADITIONAL</h2>
        </div>
        
        <!-- Scenario Image -->
        <div class="flex justify-center mb-8">
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('images/game/5/traditional.png') }}" alt="Traditional Bullying Scenario" class="w-full h-64 object-cover">
            </div>
        </div>
        
        <!-- Sequence Selection Area -->
        <div class="mb-2">
            <h3 class="text-md font-medium text-indigo-700 mb-2">เรียงลำดับเหตุการณ์ให้ถูกต้อง</h3>
            <div class="grid grid-cols-3 gap-4 mb-6" id="sequence-slots">
                <div class="sequence-slot border-2 border-dashed border-indigo-300 rounded-lg aspect-square flex items-center justify-center relative" data-position="1">
                    <span class="slot-number text-2xl font-bold text-indigo-400">1</span>
                    <div class="slot-content hidden w-full h-full"></div>
                </div>
                <div class="sequence-slot border-2 border-dashed border-indigo-300 rounded-lg aspect-square flex items-center justify-center relative" data-position="2">
                    <span class="slot-number text-2xl font-bold text-indigo-400">2</span>
                    <div class="slot-content hidden w-full h-full"></div>
                </div>
                <div class="sequence-slot border-2 border-dashed border-indigo-300 rounded-lg aspect-square flex items-center justify-center relative" data-position="3">
                    <span class="slot-number text-2xl font-bold text-indigo-400">3</span>
                    <div class="slot-content hidden w-full h-full"></div>
                </div>
            </div>
        </div>
        
        <!-- Character Selection Area -->
        <div class="mb-2">
            <h3 class="text-md font-medium text-indigo-700 mb-2">เลือกเหตุการณ์</h3>
            <div class="grid grid-cols-3 gap-4" id="character-options">
                <div class="character-option cursor-pointer aspect-square" data-character="bully" data-correct-position="1">
                    <div class="bg-indigo-500 text-white rounded-lg p-3 text-center font-medium transition-all hover:bg-indigo-600 h-full flex flex-col justify-center">
                        <div class="text-lg">ผู้รังแก</div>
                        <div class="text-xs">BULLY</div>
                    </div>
                </div>
                <div class="character-option cursor-pointer aspect-square" data-character="bystander" data-correct-position="3">
                    <div class="bg-indigo-500 text-white rounded-lg p-3 text-center font-medium transition-all hover:bg-indigo-600 h-full flex flex-col justify-center">
                        <div class="text-lg">ผู้เห็นเหตุการณ์</div>
                        <div class="text-xs">BYSTANDER</div>
                    </div>
                </div>
                <div class="character-option cursor-pointer aspect-square" data-character="victim" data-correct-position="2">
                    <div class="bg-indigo-500 text-white rounded-lg p-3 text-center font-medium transition-all hover:bg-indigo-600 h-full flex flex-col justify-center">
                        <div class="text-lg">ผู้ถูกรังแก</div>
                        <div class="text-xs">VICTIM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl.png') }}" alt="Happy Student" class="w-32 h-auto mx-auto mb-4">
            <h3 class="text-xl font-bold text-indigo-800 mb-2">เยี่ยมมาก!</h3>
            <p class="text-gray-700 mb-2">คุณตอบได้ถูกต้อง</p>
            <p class="text-gray-600 text-sm mb-6">เริ่มความก้าวหน้าในเกมต่อไปกัน</p>
            <button id="success-btn" class="bg-[#929AFF] text-white font-medium py-3 px-8 rounded-xl transition-colors hover:bg-indigo-600">
                เริ่ม
            </button>
        </div>
    </div>

    <!-- Failure Modal -->
    <div id="failure-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 text-center">
            <img src="{{ asset('images/material/school_girl_false.png') }}" alt="Confused Student" class="w-32 h-auto mx-auto mb-4">
            <h3 class="text-xl font-bold text-red-600 mb-2">ลองอีกครั้ง</h3>
            <p class="text-gray-700 mb-6">คำตอบยังไม่ถูกต้อง</p>
            <div class="flex gap-3 justify-center">
                <button id="skip-btn" class="bg-gray-400 text-white font-medium py-3 px-6 rounded-xl transition-colors hover:bg-gray-500">
                    ข้าม
                </button>
                <button id="retry-btn" class="bg-[#929AFF] text-white font-medium py-3 px-6 rounded-xl transition-colors hover:bg-indigo-600">
                    อีกครั้ง
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const characterOptions = document.getElementById('character-options');
            const sequenceSlots = document.querySelectorAll('.sequence-slot');
            const characterElements = Array.from(characterOptions.children);
            
            let selectedSequence = [];
            let availableOptions = ['bully', 'victim', 'bystander'];
            
            // Shuffle character options
            function shuffleOptions() {
                for (let i = characterElements.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    characterOptions.appendChild(characterElements[j]);
                }
            }
            
            // Initialize game
            shuffleOptions();
            
            // Handle character option clicks
            document.querySelectorAll('.character-option').forEach(option => {
                option.addEventListener('click', function() {
                    const character = this.getAttribute('data-character');
                    
                    if (!availableOptions.includes(character)) return;
                    
                    // Find next empty slot
                    const nextSlot = Array.from(sequenceSlots).find(slot => 
                        slot.querySelector('.slot-content').classList.contains('hidden')
                    );
                    
                    if (nextSlot) {
                        addToSequence(character, nextSlot);
                        // Change background color to gray
                        const buttonDiv = this.querySelector('div');
                        buttonDiv.style.backgroundColor = '#939393';
                        buttonDiv.style.color = 'white';
                        this.style.pointerEvents = 'none';
                        availableOptions = availableOptions.filter(opt => opt !== character);
                        
                        // Check if all slots are filled
                        if (selectedSequence.length === 3) {
                            setTimeout(checkAnswer, 500);
                        }
                    }
                });
            });
            
            function addToSequence(character, slot) {
                const slotContent = slot.querySelector('.slot-content');
                const slotNumber = slot.querySelector('.slot-number');
                
                selectedSequence.push(character);
                
                // Create character display - text covering the slot
                const characterText = getCharacterText(character);
                slotContent.innerHTML = `
                    <div class="selected-character bg-indigo-500 text-white rounded-lg w-full h-full flex flex-col justify-center items-center text-center font-medium relative transition-all hover:bg-indigo-600">
                        <div class="text-lg">${characterText.main}</div>
                        <div class="text-xs">${characterText.sub}</div>
                        <button class="remove-btn absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600" data-character="${character}">
                            ×
                        </button>
                    </div>
                `;
                
                slotContent.classList.remove('hidden');
                slotNumber.classList.add('hidden');
                
                // Add remove functionality
                slotContent.querySelector('.remove-btn').addEventListener('click', function(e) {
                    e.stopPropagation();
                    removeFromSequence(character, slot);
                });
            }
            
            function removeFromSequence(character, slot) {
                const slotContent = slot.querySelector('.slot-content');
                const slotNumber = slot.querySelector('.slot-number');
                
                // Remove from sequence array
                selectedSequence = selectedSequence.filter(item => item !== character);
                
                // Reset slot
                slotContent.innerHTML = '';
                slotContent.classList.add('hidden');
                slotNumber.classList.remove('hidden');
                
                // Re-enable character option and reset color
                const characterOption = document.querySelector(`[data-character="${character}"]`);
                const buttonDiv = characterOption.querySelector('div');
                buttonDiv.style.backgroundColor = '#6366f1'; // Original indigo-500 color
                buttonDiv.style.color = 'white';
                characterOption.style.pointerEvents = 'auto';
                availableOptions.push(character);
            }
            
            function reorganizeSequence() {
                // Clear all slots
                sequenceSlots.forEach(slot => {
                    const slotContent = slot.querySelector('.slot-content');
                    const slotNumber = slot.querySelector('.slot-number');
                    slotContent.innerHTML = '';
                    slotContent.classList.add('hidden');
                    slotNumber.classList.remove('hidden');
                });
                
                // Re-add characters in order
                const currentSequence = [...selectedSequence];
                selectedSequence = [];
                
                currentSequence.forEach((character, index) => {
                    addToSequence(character, sequenceSlots[index]);
                });
            }
            
            function getCharacterText(character) {
                const texts = {
                    'bully': { main: 'ผู้รังแก', sub: 'BULLY' },
                    'victim': { main: 'ผู้ถูกรังแก', sub: 'VICTIM' },
                    'bystander': { main: 'ผู้เห็นเหตุการณ์', sub: 'BYSTANDER' }
                };
                return texts[character];
            }
            
            function checkAnswer() {
                const correctSequence = ['bully', 'victim', 'bystander'];
                const isCorrect = JSON.stringify(selectedSequence) === JSON.stringify(correctSequence);
                
                if (isCorrect) {
                    showSuccessModal();
                } else {
                    showFailureModal();
                }
            }
            
            function showSuccessModal() {
                const modal = document.getElementById('success-modal');
                modal.classList.remove('hidden');
                modal.classList.add('animate-fadeIn');
                
                document.getElementById('success-btn').onclick = function() {
                    window.location.href = "{{ route('main') }}";
                };
            }
            
            function showFailureModal() {
                const modal = document.getElementById('failure-modal');
                modal.classList.remove('hidden');
                modal.classList.add('animate-fadeIn');
                
                document.getElementById('retry-btn').onclick = function() {
                    modal.classList.add('hidden');
                };
                
                document.getElementById('skip-btn').onclick = function() {
                    window.location.href = "{{ route('main') }}";
                };
            }
        });
    </script>
    
    <style>
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }
        
        .aspect-square {
            aspect-ratio: 1 / 1;
        }
        
        .sequence-slot {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .sequence-slot .slot-content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 0.5rem;
        }
        
        .sequence-slot.filled {
            border-color: #6366f1;
            background-color: #f0f4ff;
        }
        
        .character-option {
            transition: all 0.3s ease;
        }
        
        .character-option:not([style*="pointer-events: none"]):hover div {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        
        .character-option div {
            transition: all 0.3s ease;
        }
        
        .remove-btn {
            transition: all 0.2s ease;
        }
        
        .remove-btn:hover {
            transform: scale(1.1);
        }
        
        .selected-character {
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
@endsection