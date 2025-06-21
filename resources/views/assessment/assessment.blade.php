@extends('layouts.main_category.index')

@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-8 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">แบบคัดกรอง</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">หมวดหมู่</p>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <a href="{{ route('cyberbullying') }}" class="block relative">
            <div class="flex items-center h-24 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-2 -top-8 z-10">
                    <img src="{{ asset('images/assessment/cyberbullying.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="flex flex-col text-center">
                        <div class="font-medium text-white text-lg mb-1">แบบคัดกรอง</div>
                        <div class="font-medium text-white text-xl">CYBERBULLYING</div>
                    </div>
                </div>
            </div>
        </a>

        <div class="mb-6"></div>

        <!-- Mental Health Card ที่เปิด Modal -->
        <div id="mental-health-card" class="block relative cursor-pointer">
            <div class="flex items-center h-24 rounded-[10px] relative"
                style="background-color: rgba(146, 154, 255, 1)">
                <!-- รูปด้านซ้ายที่ล้นออกด้านบน -->
                <div class="absolute left-5 -top-8 z-10">
                    <img src="{{ asset('images/assessment/mental_health.png') }}" alt="Teen Icon" class="w-auto h-28 object-contain">
                </div>
                <!-- ข้อความอยู่กึ่งกลางด้านขวา -->
                <div class="flex-1 flex items-center justify-center pr-6 pl-24">
                    <div class="flex flex-col text-center">
                        <div class="font-medium text-white text-lg mb-1">แบบคัดกรอง</div>
                        <div class="font-medium text-white text-xl">สุขภาพทางจิต</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mental Health Assessment Modal -->
    <div id="mental-health-modal"
        class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden opacity-0">
        <div id="modal-content"
            class="modal-content bg-white rounded-2xl shadow-xl p-8 max-w-sm w-full mx-4 text-center transform scale-50">
            <div class="mb-4">
                <h3 class="text-xl font-medium text-[#3E36AE] mb-1">แบบประเมินพฤติกรรม</h3>
                <h4 class="text-2xl font-bold text-[#3E36AE]">BEHAVIORAL ASSESSMENT</h4>
            </div>

            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-6 object-cover">

            <div class="mb-2">
                <h3 class="text-xl font-medium text-[#3E36AE] mb-4">ประเมินสุขภาพจิต</h3>
                <p class="text-xl font-bold text-[#3E36AE]">เริ่มทำแบบสอบถามกันเลย</p>
            </div>

            <button id="start-assessment-btn"
                class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors hover:bg-[#7B85FF]">
                เริ่ม
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mentalHealthCard = document.getElementById('mental-health-card');
            const modal = document.getElementById('mental-health-modal');
            const startAssessmentBtn = document.getElementById('start-assessment-btn');
            
            let modalShown = false;

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

            // เมื่อกดการ์ด Mental Health
            mentalHealthCard.addEventListener('click', function() {
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

            // เมื่อกดปุ่มเริ่มใน Modal
            startAssessmentBtn.addEventListener('click', function() {
                // Set flag to prevent modal from showing again
                modalShown = true;
                window.location.href = '{{ route("mental_health/form") }}';
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

            // Add hover effects to cards
            const cards = document.querySelectorAll('.block.relative');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.transition = 'transform 0.2s ease-in-out';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
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

        .block.relative {
            transition: transform 0.2s ease-in-out;
        }

        .block.relative:hover {
            transform: translateY(-2px);
        }

        .block.relative:active {
            transform: translateY(0);
        }
    </style>
@endsection