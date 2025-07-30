<!-- Updated Completion Modal -->
<div id="completionModal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="completion-content modal-content">
        <div class="text-center p-8 pb-1">
            <div class="celebration-icon">🎉</div>   
        </div>

        <div class="px-8 pb-8">
            <h2 class="text-xl font-bold text-[#3E36AE] mb-6 text-center">เคล็ดลับความปลอดภัย</h2>
            
            <!-- Improved STOP BLOCK TELL BE STRONG section -->
            <div class="bg-gradient-to-br from-[#E5C8F6] to-[#D1D5FF] rounded-2xl p-6 shadow-lg">
                <div class="grid gap-4">
                    <div class="bg-white/50 rounded-xl p-4 shadow-sm border border-white/30">
                        <p class="text-lg font-bold text-[#4A4A8C] mb-1">STOP</p>
                        <p class="text-sm text-[#5A5A8C]">หยุดและไม่ตอบโต้</p>
                    </div>
                    
                    <div class="bg-white/50 rounded-xl p-4 shadow-sm border border-white/30">
                        <p class="text-lg font-bold text-[#4A4A8C] mb-1">BLOCK</p>
                        <p class="text-sm text-[#5A5A8C]">ปิดกั้นผู้กระทำผิด</p>
                    </div>
                    
                    <div class="bg-white/50 rounded-xl p-4 shadow-sm border border-white/30">
                        <p class="text-lg font-bold text-[#4A4A8C] mb-1">TELL</p>
                        <p class="text-sm text-[#5A5A8C]">บอกผู้ใหญ่ที่ไว้ใจ</p>
                    </div>
                    
                    <div class="bg-white/50 rounded-xl p-4 shadow-sm border border-white/30">
                        <p class="text-lg font-bold text-[#4A4A8C] mb-1">BE STRONG</p>
                        <p class="text-sm text-[#5A5A8C]">เข้มแข็งและมั่นใจในตัวเอง</p>
                    </div>
                </div>
            </div>
            
            <p class="text-indigo-800 text-lg mb-1 mt-6 text-center">สิ้นสุดความท้าทาย</p>
            <div class="text-center">
                <div class="flex gap-6 justify-center mt-2">
                    <button onclick="goToMainScenarios()" class="bg-gray-400 text-white font-medium text-md py-1 px-4 rounded-lg transition-colors hover:bg-gray-500">
                        ออก
                    </button>
                    <button onclick="restartFromFirstScenario()" class="bg-[#929AFF] text-white font-medium text-md py-1 px-4 rounded-lg transition-colors hover:bg-[#7B85FF]">
                        เริ่มใหม่
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.celebration-icon {
    font-size: 3rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.modal-content {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    max-width: 400px;
    width: 90%;
    margin: 0 auto;
}
</style>