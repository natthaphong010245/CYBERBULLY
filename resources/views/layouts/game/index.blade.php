<!DOCTYPE html>
<html lang="th" class="bg-gradient-to-b from-[#E5C8F6] to-[#929AFF] bg-no-repeat bg-fixed h-screen">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anti-Cyberbullying</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@500&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
  background-image: linear-gradient(to bottom, #E5C8F6 0%, #929AFF @yield('gradient-percentage', '40%'));
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

img {
  max-width: 100%;
  height: auto;
}

.card-container {
  display: flex;
  flex-direction: column;
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
      <div class="desktop-container pt-1">
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
                <div class="relative">
                    @yield('game-title')
                </div>
            </div>
        </div>
      </div>
    </div>
    
    <div class="content-section">
      <main class="bg-white rounded-top-section pt-8 pb-10 desktop-main flex-grow h-full">
        @yield('content')
      </main>
    </div>
  </div>
</body>
</html>