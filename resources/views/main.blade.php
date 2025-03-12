@extends('layouts.main.index')

@section('content')
<!-- Card section - Always in a single column -->
<div class="card-container space-y-4 px-4 md:px-0">
  <!-- VDO Card -->
  <a href="main_video" class="card-item gradient-border block">
    <div class="card-text">
      <div class="card-title">CYBER<br>BULLYING</div>
      <div class="card-subtitle">VDO</div>
    </div>
    <div class="card-image">
      <img src="images/video.jpg" alt="Video">
    </div>
  </a>
  
  <!-- Infographic Card -->
  <a href="main_info" class="card-item gradient-border block">
    <div class="card-text">
      <div class="card-title">CYBER<br>BULLYING</div>
      <div class="card-subtitle">Infographic</div>
    </div>
    <div class="card-image">
      <img src="images/info.jpg" alt="Infographic">
    </div>
  </a>

  <!-- Game Card -->
  <a href="main_video_teens" class="card-item gradient-border block">
    <div class="card-text">
      <div class="card-title">CYBER<br>BULLYING</div>
      <div class="card-subtitle">Game</div>
    </div>
    <div class="card-image">
      <img src="images/game.jpg" alt="Game">
    </div>
  </a>

  <!-- สุขภาพจิต Card -->
  <a href="main_video_teens" class="card-item gradient-border block">
    <div class="card-text">
      <div class="card-title">CYBER<br>BULLYING</div>
      <div class="card-subtitle">สุขภาพจิต</div>
    </div>
    <div class="card-image">
      <img src="images/เเบบสอบถาม.jpg" alt="สุขภาพจิต">
    </div>
  </a>

  <!-- แบบคัดกรอง Card -->
  <a href="main_video_teens" class="card-item gradient-border block">
    <div class="card-text">
      <div class="card-title">CYBER<br>BULLYING</div>
      <div class="card-subtitle">แบบคัดกรอง</div>
    </div>
    <div class="card-image">
      <img src="images/เเบบคัดกรอง.jpg" alt="แบบคัดกรอง">
    </div>
  </a>

  <!-- FAQ Card -->
  <a href="main_video_teens" class="card-item gradient-border card-faq block">
    <div class="card-image">
      <img src="images/FAQ.jpg" alt="FAQ">
    </div>
  </a>
</div>
@endsection