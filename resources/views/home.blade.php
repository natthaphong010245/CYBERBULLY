<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anti-Cyberbullying</title>
  <link rel="icon" href="./image/logo.png">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=K2D:wght@500&display=swap');

* {
  
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Noto Serif Thai', serif;
  font-family: 'K2D', sans-serif;
  
}

html, body {
  min-height: 100vh;
  width: 100%;
}

body {
  background: transparent; /* Let the html gradient show through */
  min-height: 100vh;
  position: relative; /* สำหรับการวางตำแหน่งปุ่ม info */
}

html{
  background: linear-gradient(180deg, rgba(229, 200, 246, 1) 0%, rgba(146, 154, 255, 1) 100%);
}
  header .logo{
    margin-top: 5%;
    text-align: center;
    margin-bottom: 5%;
    
  }
  main .head{
    margin-top: 20px;
    text-align: center;
    font-size: 28px;
    color: #3f75b6;
  }

  /* ปุ่มเกี่ยวกับเรา */
  .info-button {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 30px;
    height: 30px;
    
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    cursor: pointer;
    z-index: 100;
    border: none;
    font-size: 16px;
  }

  /* Modal popup */
  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    overflow-y: auto;
  }

  .modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 30px;
    width: 80%;
    max-width: 800px;
    border-radius: 15px !important; /* เพิ่ม !important เพื่อให้แน่ใจว่าใช้ค่านี้เสมอ */
    position: relative;
    max-height: 80vh;
    overflow-y: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เพิ่มเงาเพื่อให้ดูชัดเจนขึ้น */
  }

  
  .modal-content {
    -ms-overflow-style: none;  /* สำหรับ IE และ Edge */
    scrollbar-width: none;     /* สำหรับ Firefox */
    overflow-y: auto;
    border-radius: 15px !important;
  }

  .modal-content::-webkit-scrollbar {
    display: none;  /* สำหรับ Chrome, Safari และ Opera */
  }


  .close-button {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
    background: none;
    border: none;
    color: #aaa;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
  }

  .close-button:hover {
    color: #555;
    background-color: #f1f1f1;
  }

  .modal-title {
    font-size: 24px;
    color: #4a3f87;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
  }

  .modal-text {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 20px;
  }

  .researchers-section {
    margin-top: 30px;
  }

  .researcher {
    margin-bottom: 20px;
  }

  .researcher-name {
    font-weight: bold;
    color: #4a3f87;
    margin-bottom: 5px;
  }

  .researcher-details {
    font-size: 14px;
    color: #555;
  }

  .partners-logo {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    margin: 30px 0;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
  }

  .partners-logo img {
    height: 60px;
    width: auto;
  }

  .university-info {
            text-align: center;
            padding: 20px 0;
            color: #4a3f87;
        }
        .university-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .university-sub {
            font-size: 20px;
        }

  main {
    border-top-left-radius: 60px; 
    border-top-right-radius: 60px; 
    background-color: #ffffff; 
    padding: 20px; 
  }
  
  .enter-button {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15%;
    margin-bottom: 10%;
}

.Enter {
  background-color: #8967e8;
  border: 2px solid #8967e8;
  border-radius: 22px;
  color: #ffffff;
  cursor: pointer;
  font-size: 20px;
  text-align: center;
  height: 55px;
  width: 90%;
}
  
  .Enter:hover {
    box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
    transform: translateY(-2px);
  }

  .Enter-app {
    background-color: #ffffff;
    border: 2px solid #ffffff;
    border-radius: 22px;
    color: #000000;
    cursor: pointer;
    font-size: 24px;
    text-align: center;
    height: 55px;
    width: 90%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
  } 
  
  .Enter-app:hover {
    box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
    transform: translateY(-2px);
  }

  .centered-text {
    display: flex;
    align-items: center;
    font-size: 20px;
    margin-bottom: 10%;
  }
  
  .line {
    flex-grow: 1;
    height: 1px;
    background-color: #000;
    margin: 0 10px; 
  }
  

  
  .talk-area {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .icon-1 {
    margin-right: 20px; 
    margin-left: -40px; 
    font-size: 20px;
  }
  
  .icon-2 {
    margin-right: 15px; 
    margin-left: -13px; 
    font-size: 20px;
  }

  .about, .programs, .news {
    margin-bottom: 10%; 
  }

  .enter-admin{
    margin-top: 15%;
    text-align: center;
    font-size: 18px;
    margin-bottom: 5%;
  }
  img{
    height: auto;
    width: 80%;
  }
  .enter-admin a{
    color: #8967e8;
  }
 
  @media screen and (min-width: 1200px) {
   
    * {
  
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Noto Serif Thai', serif;
      font-family: 'K2D', sans-serif;
      
    }
    html{
      background: linear-gradient(to bottom, rgba(229, 200, 246, 1) 0%, rgba(146, 154, 255, 1) 100%);
    }
      header .logo{
        margin-top: 1%;
        text-align: center;
        margin-bottom: 1%;
        
      }
      main .head{
        margin-top: 1%;
        text-align: center;
        font-size: 200%;
        color: #3f75b6;
      }
      
      body{
        padding-left: 20%;
        padding-right: 20%;
      }
      main {
        border-top-left-radius: 60px; 
        border-top-right-radius: 60px; 
        background-color: #ffffff; 
        padding: 20px; 
      }
      
      .enter-button {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 5%;
        margin-bottom: 5%;
    }
    
      .Enter {
        background-color: #8967e8;
        border: 2px solid #8967e8;
        border-radius: 22px;
        color: #ffffff;
        cursor: pointer;
        font-size: 150%;
        text-align: center;
        height: 55px;
        width: 90%;
      } 
      
      .Enter:hover {
        box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
        transform: translateY(-2px);
      }
    
      .Enter-app {
        background-color: #ffffff;
        border: 2px solid #ffffff;
        border-radius: 22px;
        color: #000000;
        cursor: pointer;
        font-size: 150%;
        text-align: center;
        height: 55px;
        width: 90%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
      } 
      
      .Enter-app:hover {
        box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
        transform: translateY(-2px);
      }
    
      .centered-text {
        display: flex;
        align-items: center;
        font-size: 18px;
        margin-bottom: 5%;
      }
      
      .line {
        flex-grow: 1;
        height: 1px;
        background-color: #000;
        margin: 0 10px; 
      }
      
    
      
      .talk-area {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      
      .icon-1 {
        margin-right: 20px; 
        margin-left: -40px; 
        font-size: 20px;
      }
      
      .icon-2 {
        margin-right: 15px; 
        margin-left: -13px; 
        font-size: 20px;
      }
    
      .about, .programs, .news {
        margin-bottom: 10%; 
      }
    
      .enter-admin{
        margin-top: 10%;
        text-align: center;
        font-size: 120%;
        
      }
      img{
        height: auto;
        width: 50%;
      }
      .enter-admin a{
        color: #8967e8;
      }

      .modal-content {
        width: 60%;
      }

      /* ปรับตำแหน่งปุ่ม info บนหน้าจอใหญ่ */
      .info-button {
        right: calc(20% + 20px);
      }
  }
  
  @media screen and (max-width: 768px) {
    header {
      min-height: 35vh; /* More gradient visible on mobile */
    }
    
   

    .partners-logo img {
      height: 40px;
    }

    .modal-content {
      width: 90%;
      margin: 10% auto;
      padding: 20px;
    }
  }
  
  </style>
</head>
<body>
  <!-- ปุ่มเกี่ยวกับเรา -->
  <button class="info-button" id="infoButton">
     <img src="images/info-button.png" alt="ข้อมูล" style="width: 100%; height: 100%; object-fit: cover;">
  </button>

  <!-- Modal Popup -->
  <div id="aboutModal" class="modal">
    <div class="modal-content">
      <button class="close-button" id="closeModal">✕</button>
      
      <h2 class="modal-title">เกี่ยวกับเรา</h2>
      
      <div class="modal-text">
        <p>เว็บแอปพลิเคชัน "****" พัฒนาขึ้นภายใต้โครงการวิจัยเรื่อง "การพัฒนาเว็บแอปพลิเคชันและแกนนำต่อพฤติกรรมต่อต้านการรังแกกันผ่านโลกไซเบอร์ในนักเรียนมัธยมต้นชาวไทยภูเขาในจังหวัดเชียงราย:การวิจัยและพัฒนา" ที่ได้รับการสนับสนุนการวิจัยจากสำนักงานการวิจัยแห่งชาติ(วช.) ประจำปีงบประมาณ2568 โดยมีวัตถุประสงค์เพื่อให้นักเรียนมัธยมศึกษากลุ่มชนชาติพันธุ์ได้เรียนรู้เกี่ยวกับการรังแกกันผ่านโลกไซเบอร์การรับมือกับการรังแกกันสามารถคัดกรองสุขภาพจิตและพฤติกรรมการรังแกกันผ่านโลกไซเบอร์ได้ด้วยตนเองตลอดจนช่องทางต่างๆหรือแหล่งที่สามารถติดต่อขอความช่วยเหลือได้</p>
      </div>

      <div class="partners-logo">
        <!-- ส่วนแสดงโลโก้ผู้เกี่ยวข้อง -->
        <img src="images/วช2.png" alt="Logo 1">
        <img src="images/MFU.png" alt="Logo 2">
        <img src="images/สาธาmfu.png" alt="Logo 3">
        <img src="images/excellence.png" alt="Logo 4">
        <img src="images/ตรากระทรวงสาธารณสุขใหม่.png" alt="Logo 5">
      </div>

      <div class="researchers-section">
        <h3 style="color: #4a3f87; margin-bottom: 15px;">คณะนักวิจัย</h3>
        
        <div class="researcher">
          <div class="researcher-name">อาจารย์ ดร. ฐาปกรณ์ เรือนใจ</div>
          <div class="researcher-details">สาขาวิชาสาธารณสุขศาสตร์ และศูนย์ความเป็นเลิศการวิจัยสุขภาพชนชาติพันธุ์<br>สำนักวิชาวิทยาศาสตร์สุขภาพ มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="researcher">
          <div class="researcher-name">อาจารย์ ฐิตาพร แก้วบุญชู</div>
          <div class="researcher-details">สาขาวิชาสาธารณสุขศาสตร์ สำนักวิชาวิทยาศาสตร์สุขภาพ<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="researcher">
          <div class="researcher-name">อาจารย์ ดร. วิลาวัณย์ ไชยอุต</div>
          <div class="researcher-details">สาขาวิชากายภาพบำบัด สำนักวิชาการแพทย์บูรณาการ<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="researcher">
          <div class="researcher-name">นางสาวฟาติมา ยีหมาด</div>
          <div class="researcher-details">สาขาวิชากายภาพบำบัด สำนักวิชาการแพทย์บูรณาการ<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="researcher">
          <div class="researcher-name">อาจารย์ ดร.ขวัญตา คีรีมาศทอง</div>
          <div class="researcher-details">สำนักวิชาเทคโนโลยีดิจิทัลประยุกต์ และสถาบันนวัตกรรมการเรียนรู้<br>มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        
        <div class="researcher" style="margin-top: 30px;">
          <div class="researcher-name">ที่ปรึกษาโครงการวิจัย</div>
          <div class="researcher-details">รองศาสตราจารย์ ดร.ธวัชชัย อภิเดชกุล<br>สาขาวิชาสาธารณสุขศาสตร์ และศูนย์ความเป็นเลิศการวิจัยสุขภาพชนชาติพันธุ์<br>สำนักวิชาวิทยาศาสตร์สุขภาพ มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
      </div>
      
      
    </div>
  </div>

  <header>
    <div class="container">
      <div class="logo">
        <a href="./"><img src="images/logo.png" alt="logo" class="logo"></a>
      </div>
    </div>
  </header>
  <main>
    <section class="about">
      <div class="container">
        <div class="university-info">
          <div class="university-name">สำนักวิชาวิทยาศาสตร์สุขภาพ</div>
          <div class="university-sub">มหาวิทยาลัยแม่ฟ้าหลวง</div>
        </div>
        <div class="enter-button">
          <button class="Enter" onclick="window.location.href ='main';">เข้าสู่เว็บไซต์</button>
        </div>
        <div class="centered-text">
          <div class="line"></div>
          <h>หรือ</h>
          <div class="line"></div>
        </div>
        
        <div class="talk-area">
          <button class="Enter-app" onclick="window.location.href ='https://lin.ee/qMSjkiJ';" style="display: flex; justify-content: center; align-items: center;">
            <div style="display: flex; align-items: center;">
              <img src="images/line.png" class="icon-1" style="width: 50px; height: 50px; margin-right: 10px;">
              <div style="display: flex; flex-direction: column; justify-content: space-between;">
                <span style="margin-top: auto; margin-bottom: auto;">คุยกับผู้ดูแล</span>
              </div>
            </div>
          </button>
        </div>
        <br>
        <div class="talk-area">
          <button class="Enter-app" onclick="window.location.href ='https://www.facebook.com/profile.php?id=61558869870617';" style="display: flex; justify-content: center; align-items: center;">
            <div style="display: flex; align-items: center;">
              <img src="images/facebook.png" class="icon-1" style="width: 40px; height: 40px; margin-right: 10px;">
              <div style="display: flex; flex-direction: column; justify-content: space-between;">
                <span style="margin-top: auto; margin-bottom: auto;">ข้อมูลข่าวสาร</span>
              </div>
            </div>
          </button>
        </div>
        <div class="enter-admin">
          <p>เข้าสู่ระบบสำหรับผู้ดูแลที่นี่ <a href="login">เข้าสู่ระบบ</a></p>
        </div>
      </div>
    </section>
  </main>

  <script>
    // ส่วนของ Modal Popup
    const infoButton = document.getElementById('infoButton');
    const aboutModal = document.getElementById('aboutModal');
    const closeModal = document.getElementById('closeModal');

    infoButton.addEventListener('click', () => {
      aboutModal.style.display = 'block';
      
      // บังคับใช้ border-radius หลังจากแสดง modal
      setTimeout(() => {
        const modalContent = document.querySelector('.modal-content');
        modalContent.style.borderRadius = '15px';
        console.log('Set border radius manually');
      }, 10);
    });

    closeModal.addEventListener('click', () => {
      aboutModal.style.display = 'none';
    });

    // ปิด modal เมื่อคลิกนอกพื้นที่ modal
    window.addEventListener('click', (event) => {
      if (event.target === aboutModal) {
        aboutModal.style.display = 'none';
      }
    });
  </script>
</body>
</html>