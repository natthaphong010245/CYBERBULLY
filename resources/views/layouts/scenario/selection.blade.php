{{-- resources/views/layouts/scenario/selection.blade.php --}}
<div class="px-6">
  <!-- Scenario Grid -->
  <div class="grid grid-cols-2 gap-6 md:gap-8 max-w-4xl mx-auto pl-2 pr-2">
    @php
    $scenarios = [
      [
        'id' => 1,
        'title' => 'การปะทะคารม',
        'route' => 'scenario_1',

      ],
      [
        'id' => 2,
        'title' => 'การปะทะคารม',
        'route' => 'scenario_2',
      ],
      [
        'id' => 3,
        'title' => 'การก่อกวน',
        'route' => 'scenario_3',
      ],
      [
        'id' => 4,
        'title' => 'การใส่ร้ายป้ายสี',
        'route' => 'scenario_4',
      ],
      [
        'id' => 5,
        'title' => 'การสวมรอยเป็นคนอื่น',
        'route' => 'scenario_5',
      ],
      [
        'id' => 6,
        'title' => 'การสวมรอยเป็นคนอื่น',
        'route' => 'scenario_6',
      ],
      [
        'id' => 7,
        'title' => 'เผยแพร่ข้อมูลส่วนตัว',
        'route' => 'scenario_7',
      ],
      [
        'id' => 8,
        'title' => 'เผยแพร่ข้อมูลส่วนตัว',
        'route' => 'scenario_8',
      ],
      [
        'id' => 9,
        'title' => 'การขับออกจากกลุ่ม',
        'route' => 'scenario_9',
      ],
      [
        'id' => 10,
        'title' => 'เฝ้าติดตามทางอินเตอร์เน็ต',
        'route' => 'scenario_10',
      ],
      [
        'id' => 11,
        'title' => 'ถ่ายคลิปและเผยแพร่',
        'route' => 'scenario_11',

      ],
      [
        'id' => 12,
        'title' => 'ส่งต่อสื่อล่อแหลม',
        'route' => 'scenario_12',

      ],
      [
        'id' => 13,
        'title' => 'ส่งต่อสื่อล่อแหลม',
        'route' => 'scenario_13',

      ]
    ];
    @endphp

    @foreach($scenarios as $scenario)
    <div class="scenario-button rounded-3xl p-6 flex flex-col relative overflow-hidden {{ $scenario['id'] === 13 ? 'scenario-13-center' : '' }}" 
         onclick="goToScenario({{ $scenario['id'] }})" 
         tabindex="0"
         data-route="{{ route($scenario['route']) }}">
      
      <!-- Image Container -->
      <div class="scenario-image-container">
        <img src="{{ asset('images/scenarios/scenario_' . $scenario['id'] . '_thumb.png') }}" 
             alt="สถานการณ์ที่ {{ $scenario['id'] }}" 
             class="w-full h-full object-cover">
        

      </div>
      
      <!-- Content Section -->
      <div class="scenario-title-section flex flex-col items-center justify-center text-center">
        <h3 class="text-white font-semibold text-lg mb-1 leading-tight">
          สถานการณ์ที่ {{ $scenario['id'] }}
        </h3>
        <p class="text-white text-sm font-medium mb-2">{{ $scenario['title'] }}</p>
        <div class="flex items-center justify-center text-white text-xs opacity-80">
    
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- Scenario Styles -->
<style>
  .scenario-button {
    transition: all 0.3s ease;
    border: 2px solid #e0e6ed;
    cursor: pointer;
    background: white;
  }

  .scenario-button:hover {
    transform: translateY(-2px);
    border-color: #8B5CF6;
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
  }

  .scenario-button:focus {
    outline: none;
    border-color: #8B5CF6;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
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
    min-height: 120px;
    z-index: 2;
  }

  .scenario-13-center { 
    grid-column: 1 / -1; 
    max-width: calc(50% - 12px); 
    margin: 0 auto; 
  }
  
  .grid > div { 
    display: flex; 
    min-height: 320px; 
  }
</style>

<!-- Scenario Scripts -->
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
    
    if (currentIndex === -1) return;
    
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
      case ' ':
        e.preventDefault();
        goToScenario(parseInt(buttons[currentIndex].dataset.route.match(/\d+/)[0])); 
        return;
    }
    
    if (nextIndex !== currentIndex && buttons[nextIndex]) {
      e.preventDefault();
      buttons[nextIndex].focus();
    }
  });

  // Add click animation
  document.querySelectorAll('.scenario-button').forEach(button => {
    button.addEventListener('click', function() {
      this.style.transform = 'scale(0.95)';
      setTimeout(() => {
        this.style.transform = '';
      }, 150);
    });
  });
</script>