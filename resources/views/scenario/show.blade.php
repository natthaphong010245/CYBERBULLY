@extends('layouts.main_category')

@php
    $backUrl = '/scenario';
    $mainUrl = '/main';
@endphp


@section('content')
    @include('layouts.scenario.show')
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
    @include('layouts.scenario.script.show')
@endsection

