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
use App\Http\Controllers\BehavioralReportController;
use App\Http\Controllers\Game\BullyingGameController;

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

Route::get('/inforgraphic', function () {
    return view('inforgraphic/inforgraphic');
})->name('inforgraphic');

Route::get('/assessment/cyberbullying/person_action', function () {
    return view('assessment/cyberbullying/person_action/person_action');
})->name('person_action');

Route::get('/assessment/cyberbullying/victim', function () {
    return view('assessment/cyberbullying/victim/victim');
})->name('victim');

Route::get('/assessment/cyberbullying/overview', function () {
    return view('assessment/cyberbullying/overview/overview');
})->name('overview');

Route::get('/assessment/mental_health', function () {
    return view('assessment/mental_health/mental_health');
})->name('mental_health');

Route::get('/report_consultation/safe_area', function () {
    return view('report&consultation/safe_area/safe_area');
})->name('safe_area');

Route::get('/safe_area/voice', function () {
    return view('report&consultation/safe_area/voice/voice');
})->name('safe_area/voice');

Route::get('/safe_area/voice/result', function () {
    return view('report&consultation/safe_area/voice/result');
})->name('safe_area/voice/result');

Route::get('/safe_area/message', function () {
    return view('report&consultation/safe_area/message/message');
})->name('safe_area/message');

Route::get('/safe_area/message/result', function () {
    return view('report&consultation/safe_area/message/result');
})->name('safe_area/message/result');

// Form routes with controller - Person Action
Route::get('/assessment/cyberbullying/person_action/form', [PersonActionController::class, 'showForm'])->name('person_action/form');
Route::post('/assessment/cyberbullying/person_action/form', [PersonActionController::class, 'submitForm']);

// Results route - Person Action
Route::get('/assessment/cyberbullying/person_action/result', function () {
    $score = session('score', 0);
    $percentage = session('percentage', 0);
    
    return view('assessment.cyberbullying.person_action.form.result', compact('score', 'percentage'));
})->name('person_action/result');

// Form routes with controller - Victim
Route::get('/assessment/cyberbullying/victim/form', [VictimController::class, 'showForm'])->name('victim/form');
Route::post('/assessment/cyberbullying/victim/form', [VictimController::class, 'submitForm']);

// Results route - Victim
Route::get('/assessment/cyberbullying/victim/result', function () {
    $score = session('score', 0);
    $percentage = session('percentage', 0);
    
    return view('assessment.cyberbullying.victim.form.result', compact('score', 'percentage'));
})->name('victim/result');

// Form routes with controller - Overview (Combined)
Route::get('/assessment/cyberbullying/overview/form', [OverviewController::class, 'showForm'])->name('overview/form');
Route::post('/assessment/cyberbullying/overview/form', [OverviewController::class, 'submitForm']);

// Results route - Overview
Route::get('/assessment/cyberbullying/overview/result', [OverviewController::class, 'showResults'])->name('overview/result');

// Form routes with controller - Mental Health
Route::get('/assessment/mental_health/form', [MentalHealthController::class, 'showForm'])->name('mental_health/form');
Route::post('/assessment/mental_health/form', [MentalHealthController::class, 'submitForm']);

// Results route - Mental Health
Route::get('/assessment/mental_health/result', [MentalHealthController::class, 'showResults'])->name('mental_health/result');

// ตรวจสอบโครงสร้างไดเรกทอรี - ใช้สำหรับการแก้ไขปัญหาเท่านั้น
Route::get('/check-view-structure', function() {
    $viewPath = resource_path('views');
    
    $expectedPath = $viewPath . '/assessment/cyberbullying/person_action/form';
    
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

Route::get('/assessment', function () {
    return view('assessment/assessment');
})->name('assessment');

Route::get('/main/game', function () {
    return view('game');
})->name('main_game');

Route::get('/game', function () {
    return view('game/index');
})->name('game');

Route::get('/assessment/cyberbullying', function () {
    return view('assessment/cyberbullying/index');
})->name('cyberbullying');

Route::get('/report_consultation', function () {
    return view('report&consultation/report&consultation');
})->name('report&consultation');

Route::get('/report_consultation/request_consultation', function () {
    return view('report&consultation/request_consultation/request_consultation');
})->name('request_consultation');

Route::get('/report_consultation/behavioral_report/result', function () {
    return view('report&consultation/behavioral_report/result');
})->name('result_report');

Route::get('/report_consultation/request_consultation/teacher', function () {
    return view('report&consultation/request_consultation/teacher/teacher');
})->name('teacher_report');

Route::get('/report_consultation/request_consultation/province', function () {
    return view('report&consultation/request_consultation/province/province');
})->name('province_report');

Route::get('/report_consultation/request_consultation/country', function () {
    return view('report&consultation/request_consultation/country/country');
})->name('country_report');

Route::get('/report_consultation/request_consultation/app_center', function () {
    return view('report&consultation/request_consultation/app_center/app_center');
})->name('app_center_report');

Route::get('/game/1_1', [BullyingGameController::class, 'game1_1'])->name('game_1_1');
Route::get('/game/1_2', [BullyingGameController::class, 'game1_2'])->name('game_1_2');
Route::get('/game/1_3', [BullyingGameController::class, 'game1_3'])->name('game_1_3');
Route::get('/game/1_4', [BullyingGameController::class, 'game1_4'])->name('game_1_4');

Route::get('/game/2', function () {
    return view('game/g_2/index');
})->name('game_2');

Route::get('/game/3', function () {
    return view('game/g_3/index');
})->name('game_3');

Route::get('/game/4_1', [BullyingGameController::class, 'game4_1'])->name('game_4_1');
Route::get('/game/4_2', [BullyingGameController::class, 'game4_2'])->name('game_4_2');

Route::get('/game/5_1', [BullyingGameController::class, 'game5_1'])->name('game_5_1');
Route::get('/game/5_2', [BullyingGameController::class, 'game5_2'])->name('game_5_2');
Route::get('/game/custom', [BullyingGameController::class, 'customSequenceGame'])->name('game_custom');

Route::get('/game/6', function () {
    return view('game/g_6/index');
})->name('game_6');

Route::get('/game/7', function () {
    return view('game/g_7/index');
})->name('game_7');

Route::get('/game/8', function () {
    return view('game/g_8/index');
})->name('game_8');

Route::get('/game/9', function () {
    return view('game/g_9/index');
})->name('game_9');

Route::get('/game/10', function () {
    return view('game/g_10/index');
})->name('game_10');

Route::get('/game/11', function () {
    return view('game/g_11/index');
})->name('game_11');

Route::get('/game/12', function () {
    return view('game/g_12/index');
})->name('game_12');

Route::get('/game/13', function () {
    return view('game/g_13/index');
})->name('game_13');

Route::get('/game/14', function () {
    return view('game/g_14/index');
})->name('game_14');




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

Route::get('/report&consultation/behavioral_report', [BehavioralReportController::class, 'index'])
    ->name('behavioral-report.index');

Route::get('/report_consultation/behavioral_report', [BehavioralReportController::class, 'index'])
    ->name('behavioral_report');

Route::post('/report&consultation/behavioral_report', [BehavioralReportController::class, 'store'])
    ->name('behavioral-report.store');


    // เพิ่ม routes เหล่านี้ใน web.php ของคุณ

use App\Http\Controllers\Game\ScenarioController;

// หน้าแสดงรายการ scenarios ทั้งหมด
Route::get('/scenario', [ScenarioController::class, 'index'])->name('scenario.index');

Route::get('/scenario/completion', [ScenarioController::class, 'completion'])->name('scenario.completion');


// Routes สำหรับแต่ละสถานการณ์
Route::get('/scenario/1', [ScenarioController::class, 'scenario1'])->name('scenario_1');
Route::get('/scenario/2', [ScenarioController::class, 'scenario2'])->name('scenario_2');
Route::get('/scenario/3', [ScenarioController::class, 'scenario3'])->name('scenario_3');
Route::get('/scenario/4', [ScenarioController::class, 'scenario4'])->name('scenario_4');
Route::get('/scenario/5', [ScenarioController::class, 'scenario5'])->name('scenario_5');
Route::get('/scenario/6', [ScenarioController::class, 'scenario6'])->name('scenario_6');
Route::get('/scenario/7', [ScenarioController::class, 'scenario7'])->name('scenario_7');
Route::get('/scenario/8', [ScenarioController::class, 'scenario8'])->name('scenario_8');
Route::get('/scenario/9', [ScenarioController::class, 'scenario9'])->name('scenario_9');
Route::get('/scenario/10', [ScenarioController::class, 'scenario10'])->name('scenario_10');
Route::get('/scenario/11', [ScenarioController::class, 'scenario11'])->name('scenario_11');
Route::get('/scenario/12', [ScenarioController::class, 'scenario12'])->name('scenario_12');
Route::get('/scenario/13', [ScenarioController::class, 'scenario13'])->name('scenario_13');

// Routes สำหรับ submit คำตอบ
Route::post('/scenario/1/submit', [ScenarioController::class, 'submitScenario1'])->name('scenario_1.submit');
Route::post('/scenario/2/submit', [ScenarioController::class, 'submitScenario2'])->name('scenario_2.submit');
Route::post('/scenario/3/submit', [ScenarioController::class, 'submitScenario3'])->name('scenario_3.submit');
Route::post('/scenario/4/submit', [ScenarioController::class, 'submitScenario4'])->name('scenario_4.submit');
Route::post('/scenario/5/submit', [ScenarioController::class, 'submitScenario5'])->name('scenario_5.submit');
Route::post('/scenario/6/submit', [ScenarioController::class, 'submitScenario6'])->name('scenario_6.submit');
Route::post('/scenario/7/submit', [ScenarioController::class, 'submitScenario7'])->name('scenario_7.submit');
Route::post('/scenario/8/submit', [ScenarioController::class, 'submitScenario8'])->name('scenario_8.submit');
Route::post('/scenario/9/submit', [ScenarioController::class, 'submitScenario9'])->name('scenario_9.submit');
Route::post('/scenario/10/submit', [ScenarioController::class, 'submitScenario10'])->name('scenario_10.submit');
Route::post('/scenario/11/submit', [ScenarioController::class, 'submitScenario11'])->name('scenario_11.submit');
Route::post('/scenario/12/submit', [ScenarioController::class, 'submitScenario12'])->name('scenario_12.submit');
Route::post('/scenario/13/submit', [ScenarioController::class, 'submitScenario13'])->name('scenario_13.submit');
