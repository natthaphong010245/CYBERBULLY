  <style>

    .option-card {
      transition: all 0.3s ease;
      border: 2px solid #E5E7EB;
      background: linear-gradient(135deg, #8B7FE8 0%, #9B8BF5 100%);
      color: white;
    }

    .option-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(139, 127, 232, 0.4);
    }

    .option-card.selected {
      background: linear-gradient(135deg, #7C6FE0 0%, #8B7FE8 100%);
      box-shadow: 0 4px 20px rgba(139, 127, 232, 0.5);
    }

    .option-card input[type="radio"] {
      accent-color: white;
    }

    .option-card label span {
      color: white;
      font-weight: 500;
    }

    /* Result Modal Popup */
    .result-modal {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      z-index: 9999;
      backdrop-filter: blur(4px);
      opacity: 0;
      pointer-events: none;
      transform: scale(0.95);
      transition: opacity 0.4s ease, transform 0.4s ease;
    }

    .result-modal.show {
      opacity: 1;
      pointer-events: auto;
      transform: scale(1);
    }

    .result-content {
      background: white;
      border-radius: 24px;
      padding: 32px;
      max-width: 400px;
      width: 100%;
      text-align: center;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
      animation: modalFadeSlide 0.5s ease-out;
    }
    @keyframes modalFadeSlide {
    from {
      opacity: 0;
      transform: translateY(30px) scale(0.95);
    }
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
}



    /* Completion Modal - เพิ่มจาก artifact แรก */
    .completion-modal {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.8);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 10000;
      padding: 20px;
      opacity: 0;
      transform: scale(0.95);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .completion-modal.show {
      display: flex;
      opacity: 1;
      transform: scale(1);
    }

    .completion-content {
      background: white;
      border-radius: 24px;
      max-width: 600px;
      width: 100%;
      max-height: 90vh;
      overflow-y: auto;
      animation: modalSlideIn 0.6s ease-out;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    }

    .bullying-type {
      background: linear-gradient(135deg, #f8f9ff 0%, #e8edff 100%);
      border-left: 4px solid #8B7FE8;
      padding: 16px;
      margin-bottom: 16px;
      border-radius: 12px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .bullying-type:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(139, 127, 232, 0.2);
    }

    .bullying-title {
      color: #5A63D7;
      font-weight: 600;
      font-size: 16px;
      margin-bottom: 8px;
    }

    .bullying-description {
      color: #4A5568;
      font-size: 14px;
      line-height: 1.6;
    }

    .celebration-icon {
      background: linear-gradient(135deg, #000000 0%, #9B8BF5 100%);
      color: white;
      width: 80px;
      height: 80px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 36px;
      margin: 0 auto 20px;
      animation: celebrationPulse 2s infinite;
    }

    @keyframes celebrationPulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }
    button {
      transition: background 0.3s ease, transform 0.3s ease;
    }

    button:hover {
      transform: scale(1.05);
    }

    .completion-button {
      background: linear-gradient(135deg, #8B7FE8 0%, #9B8BF5 100%);
      color: white;
      padding: 14px 32px;
      border-radius: 16px;
      font-weight: 600;
      font-size: 16px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      display: block;
      margin: 0 auto;
    }

    .completion-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(139, 127, 232, 0.4);
    }

    .scroll-container {
      max-height: 400px;
      overflow-y: auto;
      padding-right: 10px;
    }

    .scroll-container::-webkit-scrollbar {
      width: 6px;
    }

    .scroll-container::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    .scroll-container::-webkit-scrollbar-thumb {
      background: #8B7FE8;
      border-radius: 10px;
    }

    .scroll-container::-webkit-scrollbar-thumb:hover {
      background: #7C6FE0;
    }

    #intro-modal {
      opacity: 0;
      transform: translateY(20px) scale(0.96);
      transition: opacity 0.5s ease-out, transform 0.5s ease-out;
      will-change: opacity, transform;
    }
    #intro-modal.show {
      opacity: 1;
      transform: translateY(0) scale(1);
    }


    @keyframes modalSlideIn {
      from {
        opacity: 0;
        transform: translateY(-50px) scale(0.9);
      }
      to {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    @media (min-width: 768px) {
      .desktop-container {
        width: 90%;
        max-width: 1000px;
        margin: 0 auto;
      }
      
      .desktop-main {
        max-width: 768px;
        margin: 0 auto;
      }
    }

    .modal-backdrop {
      opacity: 0;
      transform: scale(0.95);
      transition: opacity 0.4s ease, transform 0.4s ease;
      pointer-events: none;
    }

    .modal-backdrop.show {
      opacity: 1;
      transform: scale(1);
      pointer-events: auto;
    }

    .modal-content {
      animation: modalSlideIn 0.4s ease-out;
    }
  </style>



<div class="content-section">
      <main class="bg-white rounded-top-section pt-8 pb-10 desktop-main flex-grow h-full">
        
        <!-- Intro Modal - แบบเรียบง่าย -->
        <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="modal-content bg-white rounded-2xl shadow-xl p-8 max-w-sm w-full mx-4 text-center">
                <!-- ชื่อสถานการณ์ -->
                <h3 class="text-2xl font-bold text-indigo-800 mb-6">{{ $scenario['title'] }}</h3>
                
                <!-- รูปการ์ตูนนักเรียนหญิง -->
                <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                     class="w-32 h-auto mx-auto mb-6 object-contain">
                
                <!-- ข้อความสั้นๆ -->
                <p class="text-indigo-800 text-lg mb-2 font-medium">{{ $scenario['subtitle'] }}</p>
                <p class="text-indigo-800 text-lg mb-6 font-medium">เริ่มความท้าทายกันเลย</p>
                
                <!-- ปุ่มเริ่ม -->
                <button onclick="startGame()" class="bg-[#929AFF] text-white text-xl py-3 px-12 rounded-2xl transition-colors hover:bg-[#7C6FE0] font-medium">
                    เริ่ม
                </button>
            </div>
        </div>

        <!-- Game Content -->
        <div id="game-content" class="game-content">
          <div class="px-6">
              <!-- ส่วนที่น่าจะต้องการปรับ - หัวข้อ -->
              <div class="text-center">
                <h2 class="text-xl font-bold mb-1" style="color: #3E36AE;">{{ $scenario['title'] }}</h2>
                <p class="text-base" style="color: #3E36AE;">{{ $scenario['subtitle'] }}</p>
              </div>

              <!-- รูปสถานการณ์ - ลบ mb-6 -->
              <div class="text-center">
                <div class="bg-white rounded-2xl p-4 mx-auto max-w-lg">
                  <!-- กรอบรูปแบบ Figma - บางลง -->
                  <div class="border-2 border-gray-300 rounded-2xl p-4 bg-white">
                    <img src="{{ asset('images/scenarios/' . $scenario['scenarioImage']) }}" 
                        alt="{{ $scenario['altText'] }}" 
                        class="w-full h-200 object-contain rounded-xl"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display: none;" class="w-full h-64 bg-purple-100 rounded-xl flex items-center justify-center">
                      <div class="text-center">
                        <div class="w-20 h-20 bg-purple-200 rounded-full flex items-center justify-center mx-auto mb-3">
                          <span class="text-3xl font-bold text-purple-600">{{ $scenarioId }}</span>
                        </div>
                        <p class="text-purple-600 font-medium text-lg">{{ $scenario['title'] }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

             <!-- ตัวเลือกคำตอบ -->
              <form action="{{ route('scenario_' . $scenarioId . '.submit') }}" method="POST" id="scenarioForm">
                @csrf
                <div class="space-y-4 mb-8 max-w-lg mx-auto border-2 border-gray-300 rounded-2xl p-6 bg-white">
                  <h3 class="text-base font-semibold text-[#5A63D7] text-left mb-6">จากบทสนทนาน้องๆ คิดเห็นอย่างไร</h3>
                  
                  @foreach($scenario['options'] as $option)
                  <div 
                    class="option-card w-full max-w-[450px] min-h-[40px] mx-auto border border-[#C4C4C4] bg-[#AFAFFF] text-white 
                              rounded-xl flex items-center justify-center text-sm font-medium shadow-sm 
                              hover:shadow-md transition-all duration-200 cursor-pointer py-3"
                    onclick="selectOption('{{ $option['id'] }}')"
                  >
                    <label class="w-full h-full flex items-center justify-center cursor-pointer px-4">
                      <input type="radio" name="option" value="{{ $option['id'] }}" class="sr-only" required>
                      <span class="text-center leading-relaxed break-words">{{ $option['text'] }}</span>
                    </label>
                  </div>
                  @endforeach
                </div>

                <!-- ปุ่มข้าม -->
                <div class="text-right">
                  <button type="button" 
                          onclick="skipScenario()"
                          class="bg-gradient-to-r from-[#8B7FE8] to-[#9B8BF5] text-white px-8 py-3 rounded-2xl font-medium text-base hover:from-[#7C6FE0] hover:to-[#8B7FE8] transition-all duration-300 shadow-lg">
                    ข้าม
                  </button>
                </div>
              </form>

            <!-- Result Modal Popup -->
            <div id="resultModal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50">
              <div class="result-content">
                <div id="resultImage" class="w-32 h-32 mx-auto mb-6">
                  <!-- รูปจะถูกใส่ที่นี่ -->
                </div>
                
                <h2 id="resultTitle" class="text-2xl font-bold text-[#3E36AE] mb-4">
                  <!-- หัวข้อผลลัพธ์ -->
                </h2>
                
                <p id="resultMessage" class="text-[#3E36AE] leading-relaxed mb-8 text-lg">
                  <!-- ข้อความผลลัพธ์ -->
                </p>
                
                <button onclick="goToNextScenario()" 
                        class="bg-gradient-to-r from-[#8B7FE8] to-[#9B8BF5] text-white px-8 py-3 rounded-xl font-medium hover:from-[#7C6FE0] hover:to-[#8B7FE8] transition-all duration-300">
                  ถัดไป
                </button>
              </div>
            </div>

            <!-- Completion Modal -->
            <div id="completionModal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50">
              <div class="completion-content">
                <!-- Header -->
                <div class="text-center p-8 pb-4">
                  <div class="celebration-icon">
                    🎉
                  </div>
                  <h1 class="text-3xl font-bold text-[#3E36AE] mb-4">
                    ยินดีด้วย! 
                  </h1>
                  <h2 class="text-xl font-semibold text-[#5A63D7] mb-2">
                    นี้คือบทสรุปของไซเบอร์บูลลี่
                  </h2>
                  <p class="text-[#6B7280] text-base">
                    ตอนนี้คุณรู้จักรูปแบบของไซเบอร์บูลลี่และวิธีรับมือแล้ว
                  </p>
                </div>

                <!-- Content -->
                <div class="px-8 pb-8">
                  <h3 class="text-xl font-bold text-[#3E36AE] mb-6 text-center">
                    รูปแบบของไซเบอร์บูลลี่ที่พบบ่อย
                  </h3>

                  <div class="scroll-container">
                    <div class="bullying-type">
                      <div class="bullying-title">1. การคุกคาม (Harassment)</div>
                      <div class="bullying-description">
                        การส่งข้อความที่หยาบคาย น่ารังเกียจ หรือดูหมิ่นซ้ำๆ
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">2. การใส่ร้าย (Denigration/Dissing)</div>
                      <div class="bullying-description">
                        การเผยแพร่ข้อมูลเท็จหรือข่าวลือเกี่ยวกับผู้อื่นเพื่อทำลายชื่อเสียง
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">3. การแอบอ้างตัวตน (Impersonation)</div>
                      <div class="bullying-description">
                        การแฮกบัญชีออนไลน์ของผู้อื่นและใช้ในทางที่เสียหาย
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">4. การกีดกัน (Exclusion)</div>
                      <div class="bullying-description">
                        การตั้งใจไม่รวมใครบางคนออกจากกลุ่มเพื่อนหรือกิจกรรมออนไลน์
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">5. การเผยแพร่ความลับ (Outing)</div>
                      <div class="bullying-description">
                        การเปิดเผยข้อมูลส่วนตัวหรือความลับของผู้อื่นโดยไม่ได้รับอนุญาต
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">6. การหลอกลวง (Trickery)</div>
                      <div class="bullying-description">
                        การใช้อุบายเพื่อให้เหยื่อเปิดเผยข้อมูลส่วนตัวแล้วนำไปเผยแพร่
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">7. การข่มขู่คุกคาม (Threatening/Intimidation)</div>
                      <div class="bullying-description">
                        การส่งข้อความที่ขู่ทำร้ายหรือคุกคาม
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">8. การสร้างกลุ่มเพื่อโจมตี (Flaming)</div>
                      <div class="bullying-description">
                        การสร้างกลุ่มหรือเพจเพื่อโจมตีหรือประจานบุคคล
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">9. การตัดต่อภาพหรือวิดีโอ (Photo/Video Manipulation)</div>
                      <div class="bullying-description">
                        การตัดต่อภาพหรือวิดีโอของผู้อื่นให้เกิดความเสียหาย
                      </div>
                    </div>

                    <div class="bullying-type">
                      <div class="bullying-title">10. การเผยแพร่คลิปวิดีโอหรือรูปภาพที่ส่อไปในทางเสียหาย</div>
                      <div class="bullying-description">
                        การนำคลิปหรือรูปภาพที่ทำให้ผู้อื่นอับอายหรือเสียหายไปเผยแพร่
                      </div>
                    </div>
                  </div>

                  <!-- จำไว้เสมอ -->
                  <div class="mt-8 p-6 bg-gradient-to-r from-[#E5C8F6] to-[#D1D5FF] rounded-2xl">
                    <h4 class="font-bold text-[#3E36AE] text-lg mb-3 text-center">💡 จำไว้เสมอ</h4>
                    <div class="text-[#5A63D7] text-center space-y-2">
                      <p><strong>STOP</strong> - หยุดและไม่ตอบโต้</p>
                      <p><strong>BLOCK</strong> - ปิดกั้นผู้กระทำผิด</p>
                      <p><strong>TELL</strong> - บอกผู้ใหญ่ที่ไว้ใจ</p>
                      <p><strong>BE STRONG</strong> - เข้มแข็งและมั่นใจในตัวเอง</p>
                    </div>
                  </div>

                  <!-- ปุ่มกลับหน้าหลัก -->
                  <div class="text-center mt-8">
                    <button onclick="goToHome()" class="completion-button">
                      กลับสู่หน้าหลัก
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>