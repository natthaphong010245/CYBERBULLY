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

    .scenario-button {
      transition: all 0.3s ease;
      border: 2px solid #e0e6ed;
      cursor: pointer;
    }

    .scenario-button:hover {
      transform: translateY(-2px);
      border-color: #8B5CF6;
      box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
    }

    .scenario-image-container {
      margin: -25px -25px 0 -25px;
      min-height: 160px;
      border-radius: 12px 12px 0 0;
      overflow: hidden;
      flex-grow: 1;
      position: relative;
    }

    .scenario-image-container img {
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
      border-radius: 12px 12px 0 0 !important;
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
    }

    .scenario-title-section {
      background: #929AFF;
      margin: 0 -25px -25px -25px;
      padding: 15px;
      border-radius: 0 0 20px 20px;
      min-height: 80px;
      z-index: 2;
    }

    .scenario-13-center { grid-column: 1 / -1; max-width: calc(50% - 12px); margin: 0 auto; }
    .grid > div { display: flex; min-height: 280px; }

    @media (min-width: 768px) {
      .desktop-container { width: 90%; max-width: 1000px; margin: 0 auto; }
      .desktop-main { max-width: 768px; margin: 0 auto; }
    }
  </style>
</head>
<body class="font-k2d">
  <div class="flex flex-col min-h-screen">
    <!-- Header -->
    <div class="flex-none">
      <div class="desktop-container">
        <div class="flex justify-between items-center px-8 py-4">
          <a href="{{ route('main') }}" class="text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
          </a>
          <a href="{{ route('main') }}" class="text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
          </a>
        </div>
        
        <div class="text-center mb-6">
          <a href="{{ route('home') }}" class="inline-block w-full max-w-[200px] mx-auto">
            <img src="{{ asset('images/logo.png') }}" alt="Anti-Cyberbullying Logo" class="w-full h-auto mt-4 hover:opacity-80 transition-opacity">
          </a>
        </div>
      </div>
    </div>
    
    <!-- Content -->
    <main class="flex-1 bg-white rounded-t-[40px] pt-8 pb-10 desktop-main">
      <div class="px-6">
        <div class="text-center mb-8">
          <h2 class="text-xl font-semibold text-gray-800 mb-2">เลือกสถานการณ์ที่ต้องการฝึกฝน</h2>
          <p class="text-gray-600">เลือกสถานการณ์เพื่อเรียนรู้การจัดการกับการกลั่นแกล้งทางไซเบอร์</p>
        </div>

        <!-- Scenario Grid -->
        <div class="grid grid-cols-2 gap-6 md:gap-8 max-w-4xl mx-auto pl-2 pr-2">
          @php
          $scenarios = [
            [1, 'การปะทะคารม', 'scenario_1'],
            [2, 'การปะทะคารม', 'scenario_2'],
            [3, 'การก่อกวน', 'scenario_3'],
            [4, 'การใส่ร้ายป้ายสี', 'scenario_4'],
            [5, 'การสวมรอยเป็นคนอื่น', 'scenario_5'],
            [6, 'การสวมรอยเป็นคนอื่น', 'scenario_6'],
            [7, 'เผยแพร่ข้อมูลส่วนตัวของผู้อื่น', 'scenario_7'],
            [8, 'เผยแพร่ข้อมูลส่วนตัวของผู้อื่น', 'scenario_8'],
            [9, 'การขับออกจากกลุ่ม', 'scenario_9'],
            [10, 'เฝ้าติดตามทางอินเตอร์เน็ต', 'scenario_10'],
            [11, 'ถ่ายคลิปวิดิโอและเผยแพร่บนอินเตอร์เน็ต', 'scenario_11'],
            [12, 'ส่งต่อภาพหรือวีดีโอที่ล่อแหลมทางเพศ', 'scenario_12'],
            [13, 'ส่งต่อภาพหรือวีดีโอที่ล่อแหลมทางเพศ', 'scenario_13']
          ];
          @endphp

          @foreach($scenarios as $scenario)
          <div class="scenario-button rounded-3xl p-6 flex flex-col relative overflow-hidden {{ $scenario[0] === 13 ? 'scenario-13-center' : '' }}" 
               onclick="goToScenario({{ $scenario[0] }})" 
               tabindex="0"
               data-route="{{ route($scenario[2]) }}">
            <div class="scenario-image-container">
              <img src="{{ asset('images/scenarios/scenario_' . $scenario[0] . '_thumb.png') }}" 
                   alt="สถานการณ์ที่ {{ $scenario[0] }}" 
                   class="w-full h-full object-cover">
            </div>
            <div class="scenario-title-section flex flex-col items-center justify-center text-center">
              <h3 class="text-white font-semibold text-lg mb-1 leading-tight">สถานการณ์ที่ {{ $scenario[0] }}</h3>
              <p class="text-white text-sm opacity-90 leading-snug">{{ $scenario[1] }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </main>
  </div>

  <script>
    function goToScenario(scenarioId) {
      const button = document.querySelector(`[onclick="goToScenario(${scenarioId})"]`);
      const route = button?.dataset.route;
      if (route) {
        window.location.href = route;
      }
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
      const buttons = [...document.querySelectorAll('.scenario-button')];
      const current = document.activeElement;
      const currentIndex = buttons.indexOf(current);
      
      let nextIndex = currentIndex;
      
      switch(e.key) {
        case 'ArrowRight': 
          nextIndex = currentIndex % 2 === 0 ? currentIndex + 1 : Math.min(currentIndex + 1, buttons.length - 1); 
          break;
        case 'ArrowLeft': 
          nextIndex = currentIndex % 2 === 1 ? currentIndex - 1 : Math.max(currentIndex - 1, 0); 
          break;
        case 'ArrowDown': 
          nextIndex = Math.min(currentIndex + 2, buttons.length - 1); 
          break;
        case 'ArrowUp': 
          nextIndex = Math.max(currentIndex - 2, 0); 
          break;
        case 'Enter': 
          goToScenario(currentIndex + 1); 
          return;
      }
      
      if (nextIndex !== currentIndex && buttons[nextIndex]) {
        e.preventDefault();
        buttons[nextIndex].focus();
      }
    });
  </script>
</body>
</html>