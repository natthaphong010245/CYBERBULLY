<!DOCTYPE html>
<html lang="th" class="min-h-screen w-full bg-gradient-to-b from-[#E5C8F6] to-[#929AFF]">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anti-Cyberbullying</title>
  <link rel="icon" href="./image/logo.png">
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@500&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'k2d': ['"K2D"', 'sans-serif'],
          },
          colors: {
            'purple-custom': '#8967e8',
            'blue-custom': '#3f75b6',
            'dark-purple': '#4a3f87',
          }
        }
      }
    }
  </script>
</head>
<body class="font-k2d min-h-screen w-full relative bg-transparent lg:px-[20%]">
  <!-- ปุ่มเกี่ยวกับเรา -->
  <button class="absolute top-5 right-5 lg:right-[calc(20%+20px)] w-8 h-8 rounded-full flex items-center justify-center font-bold cursor-pointer z-50 border-none text-base" id="infoButton">
    <img src="images/info-button.png" alt="ข้อมูล" class="w-full h-full object-cover">
  </button>

  <!-- Modal Popup -->
  <div id="aboutModal" class="hidden fixed top-0 left-0 w-full h-full bg-black/50 z-[1000] overflow-y-auto">
    <div class="bg-white mx-auto my-[5%] p-8 w-[90%] md:w-[80%] lg:w-[60%] max-w-[800px] rounded-[15px] relative max-h-[80vh] overflow-y-auto shadow-md scrollbar-hide">
      <button class="absolute top-4 right-4 text-2xl cursor-pointer bg-transparent border-none text-gray-400 w-8 h-8 flex items-center justify-center rounded-full hover:text-gray-700 hover:bg-gray-100" id="closeModal">✕</button>
      
      <h2 class="text-2xl text-dark-purple mb-5 text-center font-bold">เกี่ยวกับเรา</h2>
      
      <div class="text-base leading-relaxed text-gray-800 mb-5">
        <p>เว็บแอปพลิเคชัน "****" พัฒนาขึ้นภายใต้โครงการวิจัยเรื่อง "การพัฒนาเว็บแอปพลิเคชันและแกนนำต่อพฤติกรรมต่อต้านการรังแกกันผ่านโลกไซเบอร์ในนักเรียนมัธยมต้นชาวไทยภูเขาในจังหวัดเชียงราย:การวิจัยและพัฒนา" ที่ได้รับการสนับสนุนการวิจัยจากสำนักงานการวิจัยแห่งชาติ(วช.) ประจำปีงบประมาณ2568 โดยมีวัตถุประสงค์เพื่อให้นักเรียนมัธยมศึกษากลุ่มชนชาติพันธุ์ได้เรียนรู้เกี่ยวกับการรังแกกันผ่านโลกไซเบอร์การรับมือกับการรังแกกันสามารถคัดกรองสุขภาพจิตและพฤติกรรมการรังแกกันผ่านโลกไซเบอร์ได้ด้วยตนเองตลอดจนช่องทางต่างๆหรือแหล่งที่สามารถติดต่อขอความช่วยเหลือได้</p>
      </div>

      <div class="flex justify-center items-center flex-wrap gap-5 my-8 border-b border-gray-200 pb-5">
        <!-- ส่วนแสดงโลโก้ผู้เกี่ยวข้อง -->
        <img src="images/วช2.png" alt="Logo 1" class="h-[40px] md:h-[60px] w-auto">
        <img src="images/MFU.png" alt="Logo 2" class="h-[40px] md:h-[60px] w-auto">
        <img src="images/สาธาmfu.png" alt="Logo 3" class="h-[40px] md:h-[60px] w-auto">
        <img src="images/excellence.png" alt="Logo 4" class="h-[40px] md:h-[60px] w-auto">
        <img src="images/ตรากระทรวงสาธารณสุขใหม่.png" alt="Logo 5" class="h-[40px] md:h-[60px] w-auto">
      </div>

      <div class="mt-8">
        <h3 class="text-dark-purple mb-4">คณะนักวิจัย</h3>
        
        <div class="mb-5">
          <div class="font-bold text-dark-purple mb-1">อาจารย์ ดร. ฐาปกรณ์ เรือนใจ</div>
          <div class="text-sm text-gray-600">สาขาวิชาสาธารณสุขศาสตร์ และศูนย์ความเป็นเลิศการวิจัยสุขภาพชนชาติพันธุ์<br>สำนักวิชาวิทยาศาสตร์สุขภาพ มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="mb-5">
          <div class="font-bold text-dark-purple mb-1">อาจารย์ ฐิตาพร แก้วบุญชู</div>
          <div class="text-sm text-gray-600">สาขาวิชาสาธารณสุขศาสตร์ สำนักวิชาวิทยาศาสตร์สุขภาพ<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="mb-5">
          <div class="font-bold text-dark-purple mb-1">อาจารย์ ดร. วิลาวัณย์ ไชยอุต</div>
          <div class="text-sm text-gray-600">สาขาวิชากายภาพบำบัด สำนักวิชาการแพทย์บูรณาการ<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="mb-5">
          <div class="font-bold text-dark-purple mb-1">นางสาวฟาติมา ยีหมาด</div>
          <div class="text-sm text-gray-600">สาขาวิชากายภาพบำบัด สำนักวิชาการแพทย์บูรณาการ<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="mb-5">
          <div class="font-bold text-dark-purple mb-1">อาจารย์ ดร.ขวัญตา คีรีมาศทอง</div>
          <div class="text-sm text-gray-600">สำนักวิชาเทคโนโลยีดิจิทัลประยุกต์ และสถาบันนวัตกรรมการเรียนรู้<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="mt-8">
          <div class="font-bold text-dark-purple mb-1">ที่ปรึกษาโครงการวิจัย</div>
          <div class="text-sm text-gray-600">รองศาสตราจารย์ ดร.ธวัชชัย อภิเดชกุล<br>สาขาวิชาสาธารณสุขศาสตร์ และศูนย์ความเป็นเลิศการวิจัยสุขภาพชนชาติพันธุ์<br>สำนักวิชาวิทยาศาสตร์สุขภาพ มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
      </div>
    </div>
  </div>

  <header>
    <div class="container">
      <div class="text-center mt-[5%] lg:mt-[1%] mb-[5%] lg:mb-[1%]">
        <a href="./"><img src="images/logo.png" alt="logo" class="w-[80%] lg:w-[50%] h-auto mx-auto"></a>
      </div>
    </div>
  </header>
  
  <main class="rounded-t-[60px] bg-white p-5">
    <section class="mb-[10%]">
      <div class="container">
        <div class="text-center py-5 text-dark-purple">
          <div class="text-2xl font-bold mb-1">สำนักวิชาวิทยาศาสตร์สุขภาพ</div>
          <div class="text-xl">มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="flex justify-center items-center mt-[15%] lg:mt-[5%] mb-[10%] lg:mb-[5%]">
          <button class="bg-purple-custom border-2 border-purple-custom rounded-[22px] text-white cursor-pointer text-xl lg:text-2xl text-center h-[55px] w-[90%] hover:shadow-md hover:-translate-y-0.5 transition-all" onclick="window.location.href ='main';">เข้าสู่เว็บไซต์</button>
        </div>
        
        <div class="flex items-center text-lg mb-[10%] lg:mb-[5%]">
          <div class="flex-grow h-px bg-black mx-2"></div>
          <div>หรือ</div>
          <div class="flex-grow h-px bg-black mx-2"></div>
        </div>
        
        <div class="flex justify-center items-center">
          <button class="bg-white border-2 border-white rounded-[22px] text-black cursor-pointer text-lg lg:text-xl text-center h-[55px] w-[90%] shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all flex justify-center items-center" onclick="window.location.href ='https://lin.ee/qMSjkiJ';">
            <div class="flex items-center">
              <img src="images/line.png" class="w-[50px] h-[50px] mr-2.5 -ml-10 lg:-ml-10 text-xl" alt="Line">
              <div class="flex flex-col justify-between">
                <span class="my-auto">คุยกับผู้ดูแล</span>
              </div>
            </div>
          </button>
        </div>
        
        <div class="flex justify-center items-center mt-4">
          <button class="bg-white border-2 border-white rounded-[22px] text-black cursor-pointer text-lg lg:text-xl text-center h-[55px] w-[90%] shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all flex justify-center items-center" onclick="window.location.href ='https://www.facebook.com/profile.php?id=61558869870617';">
            <div class="flex items-center">
              <img src="images/facebook.png" class="w-[40px] h-[40px] mr-2.5 -ml-10 lg:-ml-10 text-xl" alt="Facebook">
              <div class="flex flex-col justify-between">
                <span class="my-auto">ข้อมูลข่าวสาร</span>
              </div>
            </div>
          </button>
        </div>
        
        <div class="mt-[15%] lg:mt-[10%] text-center text-lg lg:text-xl mb-[5%]">
          <p>เข้าสู่ระบบสำหรับผู้ดูแลที่นี่ <a href="login" class="text-purple-custom">เข้าสู่ระบบ</a></p>
        </div>
      </div>
    </section>
  </main>

  <script>
    // Add this custom CSS to hide scrollbars
    const style = document.createElement('style');
    style.textContent = `
      /* Hide scrollbar for Chrome, Safari and Opera */
      .scrollbar-hide::-webkit-scrollbar {
        display: none;
      }
      /* Hide scrollbar for IE, Edge and Firefox */
      .scrollbar-hide {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
      }
    `;
    document.head.appendChild(style);
    
    // ส่วนของ Modal Popup
    const infoButton = document.getElementById('infoButton');
    const aboutModal = document.getElementById('aboutModal');
    const closeModal = document.getElementById('closeModal');

    infoButton.addEventListener('click', () => {
      aboutModal.classList.remove('hidden');
      aboutModal.classList.add('block');
    });

    closeModal.addEventListener('click', () => {
      aboutModal.classList.remove('block');
      aboutModal.classList.add('hidden');
    });

    // ปิด modal เมื่อคลิกนอกพื้นที่ modal
    window.addEventListener('click', (event) => {
      if (event.target === aboutModal) {
        aboutModal.classList.remove('block');
        aboutModal.classList.add('hidden');
      }
    });
  </script>
</body>
</html>