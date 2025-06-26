<!DOCTYPE html>
<html lang="th" class="bg-gradient-to-b from-[#E5C8F6] to-[#929AFF] bg-no-repeat bg-fixed h-screen">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anti-Cyberbullying - สถานการณ์จำลอง</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: linear-gradient(to bottom, #E5C8F6 0%, #929AFF 40%);
      background-attachment: fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: 'K2D', sans-serif;
    }

    html, body {
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .rounded-top-section {
      border-top-left-radius: 40px;
      border-top-right-radius: 40px;
    }

    .page-layout {
      display: flex;
      flex-direction: column;
      min-height: 100%;
    }

    .header-section {
      flex: 0 0 auto;
    }

    .content-section {
      flex: 1 1 auto;
      display: flex;
      flex-direction: column;
    }

    /* Game Card Styles */
    .scenario-button {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      border: 2px solid #e0e6ed;
      display: flex;
      flex-direction: column;
      height: 100%;
      cursor: pointer;
    }

    .scenario-button:hover {
      transform: translateY(-2px);
      border-color: #8B5CF6;
      box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
    }

    .scenario-image-container {
      border-radius: 12px 12px 0 0;
      margin: -25px -25px 0 -25px;
      min-height: 160px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      flex-grow: 1;
      background: transparent;
      position: relative;
    }

    .scenario-image-container img {
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
      border-radius: 12px 12px 0 0 !important;
      border: none !important;
      box-shadow: none !important;
      background: none !important;
      display: block !important;
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
    }

    .scenario-title-section {
      background: #929AFF;
      margin: 0 -25px -25px -25px;
      padding: 15px 15px 15px 15px;
      border-radius: 0 0 20px 20px;
      min-height: 80px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      z-index: 2;
    }

    .scenario-title-section h3 {
      color: white !important;
      margin: 0 0 5px 0;
      line-height: 1.3;
      text-align: center;
      font-size: 1.1rem;
      font-weight: 600;
    }

    .scenario-title-section p {
      color: white !important;
      margin: 0;
      line-height: 1.2;
      text-align: center;
      font-size: 0.9rem;
      opacity: 0.9;
    }

    /* เพิ่ม CSS class สำหรับ scenario 13 */
    .scenario-13-center {
      grid-column: 1 / -1;
      max-width: 300px;
      margin: 0 auto;
    }

    .grid > div {
      display: flex;
      min-height: 280px;
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
  </style>
</head>
<body class="font-k2d">
  <div class="page-layout">
    <div class="header-section">
      <div class="desktop-container">
        <div class="flex justify-between items-center px-8 py-4">
          <a href="{{ route('main') }}" class="text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
          </a>
          <a href="{{ route('main') }}" class="text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
          </a>
        </div>
        
        <div class="text-center mb-6 relative">
          <div class="flex items-center justify-center">
            <div class="text-center">
              <a href="{{ route('home') }}" class="inline-block w-full max-w-[200px] mx-auto">
                <img src="{{ asset('images/logo.png') }}" alt="Anti-Cyberbullying Logo"
                    class="w-full h-auto mt-4 hover:opacity-80 transition-opacity">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content-section">
      <main class="bg-white rounded-top-section pt-8 pb-10 desktop-main flex-grow h-full">
        <div class="px-6">
          <div class="text-center mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">เลือกสถานการณ์ที่ต้องการฝึกฝน</h2>
            <p class="text-gray-600">เลือกสถานการณ์เพื่อเรียนรู้การจัดการกับการกลั่นแกล้งทางไซเบอร์</p>
          </div>

          <!-- Scenario Grid - 2 columns layout -->
          <div class="grid grid-cols-2 gap-6 md:gap-8 max-w-4xl mx-auto pl-2 pr-2">

            <!-- Scenario 1 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(1)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_1_thumb.png') }}" alt="สถานการณ์ที่ 1"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 1</h3>
                <p>การปะทะคารม</p>
              </div>
            </div>

            <!-- Scenario 2 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(2)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_2_thumb.png') }}" alt="สถานการณ์ที่ 2"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 2</h3>
                <p>การปะทะคารม</p>
              </div>
            </div>

            <!-- Scenario 3 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(3)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_3_thumb.png') }}" alt="สถานการณ์ที่ 3"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 3</h3>
                <p>การก่อกวน</p>
              </div>
            </div>

            <!-- Scenario 4 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(4)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_4_thumb.png') }}" alt="สถานการณ์ที่ 4"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 4</h3>
                <p>การใส่ร้ายป้ายสี</p>
              </div>
            </div>

            <!-- Scenario 5 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(5)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_5_thumb.png') }}" alt="สถานการณ์ที่ 5"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 5</h3>
                <p>การสวมรอยเป็นคนอื่น</p>
              </div>
            </div>

            <!-- Scenario 6 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(6)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_6_thumb.png') }}" alt="สถานการณ์ที่ 6"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 6</h3>
                <p>การสวมรอยเป็นคนอื่น</p>
              </div>
            </div>

            <!-- Scenario 7 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(7)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_7_thumb.png') }}" alt="สถานการณ์ที่ 7"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 7</h3>
                <p>เผยแพร่ข้อมูลส่วนตัวของผู้อื่น</p>
              </div>
            </div>

            <!-- Scenario 8 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(8)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_8_thumb.png') }}" alt="สถานการณ์ที่ 8"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 8</h3>
                <p>เผยแพร่ข้อมูลส่วนตัวของผู้อื่น</p>
              </div>
            </div>

            <!-- Scenario 9 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(9)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_9_thumb.png') }}" alt="สถานการณ์ที่ 9"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 9</h3>
                <p>การขับออกจากกลุ่ม</p>
              </div>
            </div>

            <!-- Scenario 10 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(10)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_10_thumb.png') }}" alt="สถานการณ์ที่ 10"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 10</h3>
                <p>เฝ้าติดตามทางอินเตอร์เน็ต</p>
              </div>
            </div>

            <!-- Scenario 11 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(11)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_11_thumb.png') }}" alt="สถานการณ์ที่ 11"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 11</h3>
                <p>ถ่ายคลิปวิดิโอและเผยแพร่บนอินเตอร์เน็ต</p>
              </div>
            </div>

            <!-- Scenario 12 -->
            <div class="scenario-button rounded-3xl p-6" onclick="goToScenario(12)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_12_thumb.png') }}" alt="สถานการณ์ที่ 12"
                     class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 12</h3>
                <p>ส่งต่อภาพหรือวีดีโอที่ล่อแหลมทางเพศ</p>
              </div>
            </div>

            <!-- Scenario 13 - ปรับให้อยู่กึ่งกลาง -->
            <div class="scenario-button rounded-3xl p-6 scenario-13-center" onclick="goToScenario(13)">
              <div class="scenario-image-container">
                <img src="{{ asset('images/scenarios/scenario_13_thumb.png') }}" alt="สถานการณ์ที่ 13"
                    class="w-full h-full object-cover">
              </div>
              <div class="scenario-title-section">
                <h3>สถานการณ์ที่ 13</h3>
                <p>ส่งต่อภาพหรือวีดีโอที่ล่อแหลมทางเพศ</p>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <script>
    // ข้อมูล route สำหรับแต่ละสถานการณ์
    const scenarioRoutes = {
      1: '{{ route("scenario_1") }}',
      2: '{{ route("scenario_2") }}',
      3: '{{ route("scenario_3") }}',
      4: '{{ route("scenario_4") }}',
      5: '{{ route("scenario_5") }}',
      6: '{{ route("scenario_6") }}',
      7: '{{ route("scenario_7") }}',
      8: '{{ route("scenario_8") }}',
      9: '{{ route("scenario_9") }}',
      10: '{{ route("scenario_10") }}',
      11: '{{ route("scenario_11") }}',
      12: '{{ route("scenario_12") }}',
      13: '{{ route("scenario_13") }}'
    };

    // ฟังก์ชันไปยังสถานการณ์ที่เลือก
    function goToScenario(scenarioId) {
      const route = scenarioRoutes[scenarioId];
      if (route) {
        window.location.href = route;
      } else {
        console.error('Route not found for scenario:', scenarioId);
      }
    }

    // เพิ่ม keyboard navigation
    document.addEventListener('keydown', function(e) {
      const buttons = document.querySelectorAll('.scenario-button');
      const currentActive = document.querySelector('.scenario-button:focus') || buttons[0];
      let nextIndex = Array.from(buttons).indexOf(currentActive);

      switch (e.key) {
        case 'ArrowRight':
          nextIndex = nextIndex % 2 === 0 ? nextIndex + 1 : nextIndex + 1;
          if (nextIndex >= buttons.length) nextIndex = 0;
          break;
        case 'ArrowLeft':
          nextIndex = nextIndex % 2 === 1 ? nextIndex - 1 : nextIndex - 1;
          if (nextIndex < 0) nextIndex = buttons.length - 1;
          break;
        case 'ArrowDown':
          nextIndex = Math.min(nextIndex + 2, buttons.length - 1);
          break;
        case 'ArrowUp':
          nextIndex = Math.max(nextIndex - 2, 0);
          break;
        case 'Enter':
          const scenarioId = nextIndex + 1;
          goToScenario(scenarioId);
          return;
      }

      if (nextIndex < buttons.length) {
        buttons[nextIndex].focus();
      }
    });

    // ทำให้ปุ่มสามารถ focus ได้
    document.querySelectorAll('.scenario-button').forEach((button, index) => {
      button.setAttribute('tabindex', '0');
    });
  </script>
</body>
</html>