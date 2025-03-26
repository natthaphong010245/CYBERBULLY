{{-- นี่คือหน้า main_category/index.blade.php --}}
<!DOCTYPE html>
<html lang="th" class="bg-gradient-to-b from-[#E5C8F6] to-[#929AFF] bg-no-repeat bg-fixed h-screen">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anti-Cyberbullying</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
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
            'cyber-blue': '#5E4DC4', 
          }
        }
      }
    }
  </script>
  <style>
    body {
            background-image: linear-gradient(to bottom, #E5C8F6 0%, #929AFF @yield('gradient-percentage', '40%'));
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'K2D',
            sans-serif;
        }
        
    html, body {
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    
    /* Custom rounded top white section */
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
    
    /* Ensure images don't break layout */
    img {
      max-width: 100%;
      height: auto;
    }
    
    /* Force single column layout for all devices */
    .card-container {
      display: flex;
      flex-direction: column;
    }
    
    /* Card styles */
    .card-item {
      position: relative;
      height: 120px;
      width: 100%;
      border-radius: 0.75rem;
      overflow: hidden;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      display: flex;
    }
    
    .card-item:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    /* Text styles */
    .card-text {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      color: #5E4DC4;
      font-weight: bold;
      z-index: 10;
      width: 30%;
    }
    
    /* Image container */
    .card-image {
      position: absolute;
      top: 0;
      right: 0;
      width: 70%;
      height: 100%;
      overflow: hidden;
    }
    
    .card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }
    
    .card-title {
      font-size: 1.25rem;
      line-height: 1.2;
    }
    
    .card-subtitle {
      font-size: 0.875rem;
      margin-top: 0.25rem;
    }
    
    /* Medium and large screen optimizations */
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
      
      .card-item {
        height: 130px;
      }
    }
    
    /* Gradient border for cards */
    .gradient-border {
      position: relative;
      border-radius: 0.75rem;
      overflow: hidden;
    }
    
    .gradient-border::before {
      content: "";
      position: absolute;
      inset: 0;
      border-radius: 0.75rem;
      padding: 1px; /* Border thickness */
      background: linear-gradient(to bottom, rgba(229, 200, 246, 1), rgba(146, 154, 255, 1));
      -webkit-mask: 
        linear-gradient(#fff 0 0) content-box, 
        linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      pointer-events: none;
      z-index: 20;
    }
    
    /* FAQ card specific style */
    .card-faq {
      padding: 0;
    }
    
    .card-faq .card-image {
      width: 100%;
      position: relative;
    }
  </style>
</head>
<body class="font-k2d">
  <div class="page-layout">
    <div class="header-section">
      <div class="desktop-container">
        <!-- Header with back and home buttons -->
        <div class="flex justify-between items-center px-8 py-6">
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
        
        <!-- Logo section -->
        <div class="text-center mb-6">
          <a href="{{ route('home') }}" class="inline-block w-full max-w-[200px] mx-auto">
            <img src="{{ asset('images/logo.png') }}" alt="Anti-Cyberbullying Logo" class="w-full h-auto hover:opacity-80 transition-opacity">
          </a>
        </div>
      </div>
    </div>
    
    <!-- Main content section with white background -->
    <div class="content-section">
      <main class="bg-white rounded-top-section pt-8 pb-10 desktop-main flex-grow h-full">
        @yield('content')
      </main>
    </div>
  </div>
</body>
</html>