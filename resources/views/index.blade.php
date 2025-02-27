<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anti-Cyberbullying</title>
  <link rel="icon" href="./images/logo.png">
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
      height: 100%;
      width: 100%;
    }

    html {
      background: linear-gradient(180deg, rgba(229, 200, 246, 1) 0%, rgba(146, 154, 255, 1) 100%);
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: transparent;
      overflow: hidden;
    }

    .container {
      text-align: center;
      padding: 20px;
      max-width: 600px;
    }

    .logo {
      margin-bottom: 60px;
      opacity: 0;
      animation: fadeIn 1s ease forwards;
    }

    .logo img {
      max-width: 60%;
      height: auto;
    }

    .university-info {
      margin-top: 30px;
      color: rgb(255, 255, 255);
      opacity: 0;
      animation: fadeIn 1s ease forwards 0.3s;
    }

    .university-name {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .university-sub {
      font-size: 20px;
    }

    /* เพิ่ม page transition overlay */
    .page-transition {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(229, 200, 246, 0);
      pointer-events: none;
      z-index: 9999;
      opacity: 0;
      transition: opacity 1s ease;
    }

    .fade-out {
      animation: fadeOut 1.2s ease forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeOut {
      from {
        opacity: 0;
      }
      50% {
        opacity: 1;
      }
      to {
        opacity: 1;
      }
    }

    /* Mobile adjustments */
    @media screen and (max-width: 768px) {
      .container {
        padding: 40px 20px;
      }
      
      .logo img {
        max-width: 80%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="images/logo.png" alt="Anti-Cyberbullying Logo">
    </div>
    
    <div class="university-info">
      <div class="university-name">สำนักวิชาวิทยาศาสตร์สุขภาพ</div>
      <div class="university-sub">มหาวิทยาลัยแม่ฟ้าหลวง</div>
    </div>
  </div>

  <!-- เพิ่ม overlay สำหรับ transition -->
  <div class="page-transition" id="pageTransition"></div>

  <script>
    setTimeout(() => {
      // สร้าง effect fade-out ก่อนเปลี่ยนหน้า
      const transition = document.getElementById('pageTransition');
      transition.style.backgroundColor = 'rgba(229, 200, 246, 1)';
      transition.classList.add('fade-out');
      
      // รอให้ animation เสร็จแล้วค่อยเปลี่ยนหน้า
      setTimeout(() => {
        window.location.href = 'home';
      }, 1000); // ความยาวของ transition
    }, 2000); // เวลารอก่อนเริ่ม transition
  </script>
</body>
</html>