@extends('layouts.main_category')

@section('content')
    <div class="card-container  px-4 md:px-0">
        <div class="text-center mb-8 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">VIDEO</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">{{ $languageName }}</p>
                </div>
            </div>
        </div>

<div class="space-y-4 max-w-2xl mx-auto">
    @foreach($videos as $video)
        <div onclick="playYouTubeVideo('{{ $video['youtube_id'] }}', '{{ $video['title'] }}')" 
             class="flex items-center gap-6 cursor-pointer border-b-[1.5px] border-[#BDC3FF] pb-4 hover:bg-gray-50 rounded transition">
            <img src="{{ $video['thumbnail'] }}" 
                 alt="{{ $video['title'] }}" 
                 class="w-32 h-32 object-cover rounded" />
            <div class="flex-1">
                <h3 class="font-semibold text-black text-lg leading-snug">
                    {{ $video['title'] }}
                </h3>
            </div>
        </div>
    @endforeach
</div>


    <!-- YouTube Video Modal -->
    <div id="youtubeModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg w-full max-w-4xl mx-auto">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 id="videoTitle" class="text-lg font-medium text-gray-900">วิดีโอ</h3>
                <button onclick="closeYouTubeVideo()" class="text-gray-500 hover:text-gray-700 p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="relative" style="padding-bottom: 56.25%; height: 0;">
                <iframe id="youtubePlayer" 
                        class="absolute top-0 left-0 w-full h-full"
                        src="" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    <script>
        function playYouTubeVideo(youtubeId, title) {
            const modal = document.getElementById('youtubeModal');
            const player = document.getElementById('youtubePlayer');
            const titleElement = document.getElementById('videoTitle');
            titleElement.textContent = title;
            player.src = `https://www.youtube.com/embed/${youtubeId}?autoplay=1&rel=0`;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeYouTubeVideo() {
            const modal = document.getElementById('youtubeModal');
            const player = document.getElementById('youtubePlayer');
            player.src = '';
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        document.getElementById('youtubeModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeYouTubeVideo();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeYouTubeVideo();
            }
        });

        
    </script>
@endsection
