@push('scripts')
  <script>
    let selectedOptionValue = null;
    const currentScenarioId = {{ $scenarioId }};
    
    // แสดง intro modal ทันทีที่โหลดหน้า
    document.addEventListener('DOMContentLoaded', function () {
      setTimeout(() => {
        showIntroModal();
      }, 0); // หรือ 200ms ก็ได้
    });

    function showIntroModal() {
      const modal = document.getElementById('intro-modal');
      modal.classList.add('show');
      document.getElementById('game-content').classList.remove('show');
    }

    function startGame() {
      const modal = document.getElementById('intro-modal');
      modal.classList.remove('show');

      // รอ transition fade-out เสร็จก่อนแสดงเนื้อหา
      setTimeout(() => {
        document.getElementById('game-content').classList.add('show');
      }, 0); // ตรงกับเวลา transition
    }

    function selectOption(optionId) {
      // Remove selected class from all cards
      document.querySelectorAll('.option-card').forEach(card => {
        card.classList.remove('selected');
      });
      
      // Add selected class to clicked card
      event.currentTarget.classList.add('selected');
      
      // Check the radio button
      document.querySelector(`input[value="${optionId}"]`).checked = true;
      selectedOptionValue = optionId;
      
      // แสดงผลลัพธ์ทันทีเมื่อเลือกคำตอบ
      setTimeout(() => {
        submitAnswer();
      }, 300); // หน่วงเวลานิดหน่อยเพื่อให้เห็น selection animation
    }

    // Enable submit button when radio is selected
    document.querySelectorAll('input[name="option"]').forEach(radio => {
      radio.addEventListener('change', function() {
        selectedOptionValue = this.value;
      });
    });

    function submitAnswer() {
      if (!selectedOptionValue) return;
      
      // ข้อมูลผลลัพธ์สำหรับแต่ละ option
      const results = {
        @foreach($scenario['options'] as $option)
        '{{ $option['id'] }}': {
          isCorrect: {{ $option['isCorrect'] ? 'true' : 'false' }},
          title: '{{ $option['feedback']['title'] }}',
          message: `{{ $option['feedback']['message'] }}`,
          image: '{{ $option['isCorrect'] ? 'correct.png' : 'wrong.png' }}'
        },
        @endforeach
      };

      const result = results[selectedOptionValue];
      
      // แสดง modal
      showResultModal(result);
    }

    function showResultModal(result) {
      const modal = document.getElementById('resultModal');
      const imageDiv = document.getElementById('resultImage');
      const title = document.getElementById('resultTitle');
      const message = document.getElementById('resultMessage');
      
      // ใส่รูป
      imageDiv.innerHTML = `<img src="{{ asset('images/') }}/${result.image}" alt="Result" class="w-full h-full object-contain">`;
      
      // ใส่ข้อความ
      title.textContent = result.title;
      message.innerHTML = result.message.replace(/\n/g, '<br>');
      
      // แสดง modal พร้อม animation
      modal.style.display = 'flex';  // แสดง modal ก่อน
      setTimeout(() => {
        modal.classList.add('show');  // เพิ่ม animation
      }, 10); // หน่วงเวลานิดหน่อยเพื่อให้ display: flex มีผล
    }

    // ฟังก์ชันใหม่: ไปสถานการณ์ถัดไปพร้อม modal
    function goToNextScenario() {
      const modal = document.getElementById('resultModal');
      modal.classList.remove('show');
      
      // รอ animation fade-out เสร็จก่อนซ่อน modal
      setTimeout(() => {
        modal.style.display = 'none';
        
        // ตรวจสอบว่าเป็นสถานการณ์สุดท้ายหรือไม่
        if (currentScenarioId == 13) {
          // แสดง completion modal
          showCompletionModal();
        } else {
          // ไปยังสถานการณ์ถัดไป
          @if(isset($scenario['nextRoute']) && $scenario['nextRoute'])
            window.location.href = "{{ route($scenario['nextRoute']) }}";
          @else
            window.location.href = "{{ route('scenario.index') }}";
          @endif
        }
      }, 300); // ตรงกับเวลา animation
    }

    function skipScenario() {
      // ตรวจสอบว่าเป็นสถานการณ์สุดท้ายหรือไม่
      if (currentScenarioId == 13) {
        // แสดง completion modal
        showCompletionModal();
      } else {
        // ไปยังสถานการณ์ถัดไป
        @if(isset($scenario['nextRoute']) && $scenario['nextRoute'])
          window.location.href = "{{ route($scenario['nextRoute']) }}";
        @else
          window.location.href = "{{ route('scenario.index') }}";
        @endif
      }
    }

    // ฟังก์ชันแสดง completion modal
    function showCompletionModal() {
      const modal = document.getElementById('completionModal');
      modal.style.display = 'flex';
      setTimeout(() => {
        modal.classList.add('show');
      }, 100);
    }

    // ฟังก์ชันกลับหน้าหลัก
    function goToHome() {
      // ใน Laravel จริงจะใช้ route
      window.location.href = "{{ route('main') }}";
    }

    // เก็บ closeModal ไว้เผื่อใช้ในกรณีอื่น
    function closeModal() {
      goToNextScenario();
    }

    // เพิ่มฟังก์ชันซ่อน modal เมื่อคลิกที่ backdrop
    document.addEventListener('DOMContentLoaded', function() {
      const resultModal = document.getElementById('resultModal');
      if (resultModal) {
        resultModal.addEventListener('click', function(e) {
          if (e.target === this) {
            goToNextScenario();
          }
        });
      }
    });
  </script>
@endpush