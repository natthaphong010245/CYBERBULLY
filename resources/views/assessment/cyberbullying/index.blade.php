{{-- resources/views/assessment/cyberbulling/index.blade.php --}}
@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-6 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">CYBERBULLYING</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">แบบคัดกรอง</p>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <div class="assessment-card block relative cursor-pointer" data-type="perpetrator">
            <div class="py-3 pl-20 pr-6 flex items-center h-24 rounded-xl"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-4 -top-6">
                    <img src="{{ asset('images/assessment/bully.png') }}" alt="Teen Icon" class="w-28 h-28 object-contain">
                </div>
                 <div class="flex flex-col ml-16">
                    <div class="font-bold text-white text-2xl  ml-2">ประสบการณ์</div>
                    <div class="font-median text-white text-xl ml-12">ผู้กระทำ</div>
                </div>
            </div>
        </div>

        <div class="assessment-card block relative cursor-pointer" data-type="victim">
            <div class="py-3 pl-20 pr-6 flex items-center h-24 rounded-xl"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-4 -top-6">
                    <img src="{{ asset('images/assessment/bullied.png') }}" alt="Teen Icon" class="w-28 h-28 object-contain">
                </div>      
                <div class="flex flex-col ml-16">
                    <div class="font-bold text-white text-2xl ml-2">ประสบการณ์</div>
                    <div class="font-median text-white text-xl ml-12">ผู้ถูกกระทำ</div>
                </div>
            </div>
        </div>

        <div class="assessment-card block relative cursor-pointer" data-type="overview">
            <div class="py-3 pl-20 pr-6 flex items-center h-24 rounded-xl"
                style="background-color: rgba(146, 154, 255, 1)">
                <div class="absolute left-4 -top-6">
                    <img src="{{ asset('images/assessment/overview.png') }}" alt="Teen Icon" class="w-28 h-28 object-contain">
                </div>
                 <div class="flex flex-col ml-16">
                    <div class="font-bold text-white text-2xl ml-2">ประสบการณ์</div>
                    <div class="font-median text-white text-xl ml-12">ภาพรวม</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assessment Modal -->
    <div id="assessment-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden opacity-0">
        <div id="modal-content" class="modal-content bg-white rounded-2xl shadow-xl p-8 max-w-sm w-full mx-4 text-center transform scale-50">
            <div class="mb-4">
                <h3 class="text-xl font-medium text-[#3E36AE] mb-1">แบบประเมินพฤติกรรม</h3>
                <h4 class="text-2xl font-bold text-[#3E36AE]">BEHAVIORAL ASSESSMENT</h4>
            </div>
            
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-6 object-cover">
            
            <div class="mb-2">
                <h3 class="text-xl font-median text-[#3E36AE] mb-4" id="modal-title">ประสบการณ์การรังแกกันเลย</h3>
                <p class="text-xl font-bold text-[#3E36AE]" id="modal-subtitle">เริ่มทำแบบสอบถามกันเลย</p>
            </div>
            
            <button id="start-assessment-btn"
                class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors hover:bg-[#7B85FF]">
                เริ่ม
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const assessmentCards = document.querySelectorAll('.assessment-card');
            const modal = document.getElementById('assessment-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalSubtitle = document.getElementById('modal-subtitle');
            const startBtn = document.getElementById('start-assessment-btn');
            
            let selectedType = '';
            let modalShown = false;
            
            // Modal content for different assessment types
            const modalContent = {
                perpetrator: {
                    title: 'ประสบการณ์การรังแกผู้กระทำ',
                    subtitle: 'เริ่มความท้าทายกันเลย',
                    route: '{{ url("assessment/cyberbullying/person_action/form") }}'
                },
                victim: {
                    title: 'ประสบการณ์การรังแกผู้ถูกกระทำ',
                    subtitle: 'เริ่มความท้าทายกันเลย',
                    route: '{{ url("assessment/cyberbullying/victim/form") }}'
                },
                overview: {
                    title: 'ประสบการณ์การรังแกภาพรวม',
                    subtitle: 'เริ่มความท้าทายกันเลย',
                    route: '{{ url("assessment/cyberbullying/overview/form") }}'
                }
            };
            
            // Handle back button / page visibility
            window.addEventListener('pageshow', function(event) {
                // Hide modal when user comes back to this page
                if (event.persisted || modalShown) {
                    closeModal();
                    modalShown = false;
                }
            });
            
            // Handle browser back button
            window.addEventListener('popstate', function(event) {
                closeModal();
                modalShown = false;
            });
            
            // Handle page visibility change (when user returns to tab)
            document.addEventListener('visibilitychange', function() {
                if (!document.hidden && modalShown) {
                    closeModal();
                    modalShown = false;
                }
            });
            
            // Add click event to assessment cards
            assessmentCards.forEach(card => {
                card.addEventListener('click', function() {
                    selectedType = this.getAttribute('data-type');
                    const content = modalContent[selectedType];
                    
                    // Update modal content
                    modalTitle.textContent = content.title;
                    modalSubtitle.textContent = content.subtitle;
                    
                    // Show modal
                    modal.classList.remove('hidden');
                    modalShown = true;
                    
                    // Animate backdrop fade in and modal zoom in
                    setTimeout(() => {
                        modal.classList.remove('opacity-0');
                        modal.classList.add('opacity-100');
                        
                        const modalContentEl = document.getElementById('modal-content');
                        modalContentEl.classList.remove('scale-50');
                        modalContentEl.classList.add('scale-100');
                    }, 10);
                });
            });
            
            // Handle start button click
            startBtn.addEventListener('click', function() {
                if (selectedType && modalContent[selectedType]) {
                    // Set flag to prevent modal from showing again
                    modalShown = true;
                    window.location.href = modalContent[selectedType].route;
                }
            });
            
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
            
            // ESC key to close modal
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
            
            function closeModal() {
                const modalContentEl = document.getElementById('modal-content');
                
                // Animate out
                modal.classList.remove('opacity-100');
                modal.classList.add('opacity-0');
                modalContentEl.classList.remove('scale-100');
                modalContentEl.classList.add('scale-50');
                
                // Hide after animation
                setTimeout(() => {
                    modal.classList.add('hidden');
                    selectedType = '';
                    modalShown = false;
                }, 300);
            }
        });
    </script>

    <style>
        .modal-backdrop {
            transition: opacity 0.3s ease-in-out;
        }
        
        .modal-content {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        
        .assessment-card {
            transition: transform 0.2s ease-in-out;
        }
        
        .assessment-card:hover {
            transform: translateY(-2px);
        }
        
        .assessment-card:active {
            transform: translateY(0);
        }
    </style>
@endsection