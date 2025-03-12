<!-- routes/web -->
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckRoleUser;
use App\Http\Controllers\PersonActionController;
use App\Http\Controllers\VictimController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\MentalHealthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/faq', function () {
    return view('faq/faq');
})->name('faq');

Route::get('/assessment/cyberbulling/person_action', function () {
    return view('assessment/cyberbulling/person_action/person_action');
})->name('person_action');

Route::get('/assessment/cyberbulling/victim', function () {
    return view('assessment/cyberbulling/victim/victim');
})->name('victim');

Route::get('/assessment/cyberbulling/overview', function () {
    return view('assessment/cyberbulling/overview/overview');
})->name('overview');

Route::get('/assessment/mental_health', function () {
    return view('assessment/mental_health/mental_health');
})->name('mental_health');

Route::get('/safe_area', function () {
    return view('safe_area/safe_area');
})->name('safe_area');

Route::get('/safe_area/voice', function () {
    return view('safe_area/voice/voice');
})->name('safe_area/voice');

Route::get('/safe_area/voice/result', function () {
    return view('safe_area/voice/result');
})->name('safe_area/voice/result');

Route::get('/safe_area/message', function () {
    return view('safe_area/message/message');
})->name('safe_area/message');

Route::get('/safe_area/message/result', function () {
    return view('safe_area/message/result');
})->name('safe_area/message/result');

// Form routes with controller - Person Action
Route::get('/assessment/cyberbulling/person_action/form', [PersonActionController::class, 'showForm'])->name('person_action/form');
Route::post('/assessment/cyberbulling/person_action/form', [PersonActionController::class, 'submitForm']);

// Results route - Person Action
Route::get('/assessment/cyberbulling/person_action/result', function () {
    $score = session('score', 0);
    $percentage = session('percentage', 0);
    
    return view('assessment.cyberbulling.person_action.form.result', compact('score', 'percentage'));
})->name('person_action/result');

// Form routes with controller - Victim
Route::get('/assessment/cyberbulling/victim/form', [VictimController::class, 'showForm'])->name('victim/form');
Route::post('/assessment/cyberbulling/victim/form', [VictimController::class, 'submitForm']);

// Results route - Victim
Route::get('/assessment/cyberbulling/victim/result', function () {
    $score = session('score', 0);
    $percentage = session('percentage', 0);
    
    return view('assessment.cyberbulling.victim.form.result', compact('score', 'percentage'));
})->name('victim/result');

// Form routes with controller - Overview (Combined)
Route::get('/assessment/cyberbulling/overview/form', [OverviewController::class, 'showForm'])->name('overview/form');
Route::post('/assessment/cyberbulling/overview/form', [OverviewController::class, 'submitForm']);

// Results route - Overview
Route::get('/assessment/cyberbulling/overview/result', [OverviewController::class, 'showResults'])->name('overview/result');

// Form routes with controller - Mental Health
Route::get('/assessment/mental_health/form', [MentalHealthController::class, 'showForm'])->name('mental_health/form');
Route::post('/assessment/mental_health/form', [MentalHealthController::class, 'submitForm']);

// Results route - Mental Health
Route::get('/assessment/mental_health/result', [MentalHealthController::class, 'showResults'])->name('mental_health/result');

// ตรวจสอบโครงสร้างไดเรกทอรี - ใช้สำหรับการแก้ไขปัญหาเท่านั้น
Route::get('/check-view-structure', function() {
    $viewPath = resource_path('views');
    
    $expectedPath = $viewPath . '/assessment/cyberbulling/person_action/form';
    
    $results = [
        'base_views_path' => $viewPath,
        'expected_directory' => $expectedPath,
        'directory_exists' => is_dir($expectedPath),
        'directory_readable' => is_readable($expectedPath),
        'expected_file' => $expectedPath . '/result.blade.php',
        'file_exists' => file_exists($expectedPath . '/result.blade.php'),
        'view_directories' => [],
    ];
    
    // List all subdirectories in views
    $directories = new RecursiveDirectoryIterator($viewPath, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($directories);
    
    foreach ($files as $file) {
        if ($file->isDir()) {
            $results['view_directories'][] = str_replace($viewPath, '', $file->getPathname());
        }
    }
    
    return response()->json($results);
});

// ตรวจสอบไฟล์ view ทั้งหมด - ใช้สำหรับการแก้ไขปัญหาเท่านั้น
Route::get('/check-view-files', function() {
    $viewPath = resource_path('views');
    $allFiles = [];
    
    $directory = new RecursiveDirectoryIterator($viewPath);
    $iterator = new RecursiveIteratorIterator($directory);
    
    foreach ($iterator as $info) {
        if ($info->isFile() && $info->getExtension() === 'php') {
            $allFiles[] = str_replace($viewPath . '/', '', $info->getPathname());
        }
    }
    
    return response()->json([
        'view_path' => $viewPath,
        'all_blade_files' => $allFiles
    ]);
});

Route::get('/safe-area/voice', [App\Http\Controllers\SafeAreaVoiceController::class, 'index'])->name('safe-area.voice');
Route::post('/safe-area/voice/store', [App\Http\Controllers\SafeAreaVoiceController::class, 'store'])->name('safe-area.voice.store');

Route::get('/safe-area/message', [App\Http\Controllers\SafeAreaMessageController::class, 'index'])->name('safe-area.message');
Route::post('/safe-area/message/store', [App\Http\Controllers\SafeAreaMessageController::class, 'store'])->name('safe-area.message.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Protected Routes
Route::middleware(['auth', CheckRoleUser::class])->group(function () {
    Route::get('/test_login', [MainController::class, 'testLogin'])->name('test_login');
});



// video

Route::get('/main_video', function () {
    return view('main_video');
})->name('main_video');
Route::get('/video_category1_select_language', function () {
    return view('video_category1/video_category1_select_language');
})->name('video_category1_select_language');

Route::get('/video_category1_select_language1', function () {
    return view('video_category1/video_category1_select_language1');
})->name('video_category1_select_language1');

Route::get('/video_category1_select_language2', function () {
    return view('video_category1/video_category1_select_language2');
})->name('video_category1_select_language2');

Route::get('/video_category1_select_language3', function () {
    return view('video_category1/video_category1_select_language3');
})->name('video_category1_select_language3');

Route::get('/video_category1_select_language4', function () {
    return view('video_category1/video_category1_select_language4');
})->name('video_category1_select_language4');

Route::get('/video_category1_select_language5', function () {
    return view('video_category1/video_category1_select_language5');
})->name('video_category1_select_language5');

Route::get('/video_category1_select_language6', function () {
    return view('video_category1/video_category1_select_language6');
})->name('video_category1_select_language6');

Route::get('/video_category1_select_language7', function () {
    return view('video_category1/video_category1_select_language7');
})->name('video_category1_select_language7');

Route::get('/video_category2_select_language', function () {
    return view('video_category2/video_category2_select_language');
})->name('video_category2_select_language');

Route::get('/video_category2_select_language1', function () {
    return view('video_category2/video_category2_select_language1');
})->name('video_category2_select_language1');

Route::get('/video_category2_select_language2', function () {
    return view('video_category2/video_category2_select_language2');
})->name('video_category2_select_language2');

Route::get('/video_category2_select_language3', function () {
    return view('video_category2/video_category2_select_language3');
})->name('video_category2_select_language3');

Route::get('/video_category2_select_language4', function () {
    return view('video_category2/video_category2_select_language4');
})->name('video_category2_select_language4');

Route::get('/video_category2_select_language5', function () {
    return view('video_category2/video_category2_select_language5');
})->name('video_category2_select_language5');

Route::get('/video_category2_select_language6', function () {
    return view('video_category2/video_category2_select_language6');
})->name('video_category2_select_language6');

Route::get('/video_category2_select_language7', function () {
    return view('video_category2/video_category2_select_language7');
})->name('video_category2_select_language7');

Route::get('/video_category3_select_language', function () {
    return view('video_category3/video_category3_select_language');
})->name('video_category3_select_language');

Route::get('/video_category3_select_language1', function () {
    return view('video_category3/video_category3_select_language1');
})->name('video_category3_select_language1');

Route::get('/video_category3_select_language2', function () {
    return view('video_category3/video_category3_select_language2');
})->name('video_category3_select_language2');

Route::get('/video_category3_select_language3', function () {
    return view('video_category3/video_category3_select_language3');
})->name('video_category3_select_language3');

Route::get('/video_category3_select_language4', function () {
    return view('video_category3/video_category3_select_language4');
})->name('video_category3_select_language4');

Route::get('/video_category3_select_language5', function () {
    return view('video_category3/video_category3_select_language5');
})->name('video_category3_select_language5');

Route::get('/video_category3_select_language6', function () {
    return view('video_category3/video_category3_select_language6');
})->name('video_category3_select_language6');

Route::get('/video_category3_select_language7', function () {
    return view('video_category3/video_category3_select_language7');
})->name('video_category3_select_language7');

Route::get('/video_category4_select_language', function () {
    return view('video_category4/video_category4_select_language');
})->name('video_category4_select_language');

Route::get('/video_category4_select_language1', function () {
    return view('video_category4/video_category4_select_language1');
})->name('video_category4_select_language1');

Route::get('/video_category4_select_language2', function () {
    return view('video_category4/video_category4_select_language2');
})->name('video_category4_select_language2');

Route::get('/video_category4_select_language3', function () {
    return view('video_category4/video_category4_select_language3');
})->name('video_category4_select_language3');

Route::get('/video_category4_select_language4', function () {
    return view('video_category4/video_category4_select_language4');
})->name('video_category4_select_language4');

Route::get('/video_category4_select_language5', function () {
    return view('video_category4/video_category4_select_language5');
})->name('video_category4_select_language5');

Route::get('/video_category4_select_language6', function () {
    return view('video_category4/video_category4_select_language6');
})->name('video_category4_select_language6');

Route::get('/video_category4_select_language7', function () {
    return view('video_category4/video_category4_select_language7');
})->name('video_category4_select_language7');