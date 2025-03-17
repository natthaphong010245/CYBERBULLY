@extends('layouts.main.index')

@section('content')
    <!-- Card section - Always in a single column -->
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-10">
        <!-- VDO Card -->
        <a href="main_video" class="card-item gradient-border block mt-4">
            <div class="card-text">
                <div class="card-title">CYBER<br>BULLYING</div>
                <div class="card-subtitle">VDO</div>
            </div>
            <div class="card-image">
                <img src="images/video.jpg" alt="Video">
            </div>
        </a>

        <!-- Infographic Card -->
        <a href="inforgraphic" class="card-item gradient-border block mt-6">
            <div class="card-text">
                <div class="card-title">CYBER<br>BULLYING</div>
                <div class="card-subtitle">Infographic</div>
            </div>
            <div class="card-image">
                <img src="images/info.jpg" alt="Infographic">
            </div>
        </a>

        <!-- Game Card -->
        <a href="main_video_teens" class="card-item gradient-border block mt-6">
            <div class="card-text">
                <div class="card-title">CYBER<br>BULLYING</div>
                <div class="card-subtitle">Game</div>
            </div>
            <div class="card-image">
                <img src="images/game.jpg" alt="Game">
            </div>
        </a>

        <!-- สุขภาพจิต Card -->
        <a href="main_video_teens" class="card-item gradient-border block mt-6">
            <div class="card-text">
                <div class="card-title">CYBER<br>BULLYING</div>
                <div class="card-subtitle">สุขภาพจิต</div>
            </div>
            <div class="card-image">
                <img src="images/เเบบสอบถาม.jpg" alt="สุขภาพจิต">
            </div>
        </a>

        <!-- แบบคัดกรอง Card -->
        <a href="main_video_teens" class="card-item gradient-border block mt-6">
            <div class="card-text">
                <div class="card-title">CYBER<br>BULLYING</div>
                <div class="card-subtitle">แบบคัดกรอง</div>
            </div>
            <div class="card-image">
                <img src="images/เเบบคัดกรอง.jpg" alt="แบบคัดกรอง">
            </div>
        </a>

        <!-- FAQ Card -->
        <a href="main_video_teens" class="card-item gradient-border card-faq block mt-6 mb-10">
            <div class="card-image">
                <img src="images/FAQ.jpg" alt="FAQ">
            </div>
        </a>
    </div>
@endsection
