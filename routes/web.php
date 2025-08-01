<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckRoleUser;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\MentalHealthController;
use App\Http\Controllers\BehavioralReportController;
use App\Http\Controllers\Game\BullyingGameController;
use App\Http\Controllers\Game\ScenarioController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\SafeAreaVoiceController;
use App\Http\Controllers\SafeAreaMessageController;
use App\Http\Controllers\SafeAreaStatsController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\DashboardController;


$basicRoutes = [
    '/' => ['view' => 'index', 'name' => 'index'],
    '/home' => ['view' => 'home', 'name' => 'home'],
    '/main' => ['view' => 'main', 'name' => 'main'],
    '/faq' => ['view' => 'faq/faq', 'name' => 'faq'],
    '/inforgraphic' => ['view' => 'inforgraphic/inforgraphic', 'name' => 'inforgraphic'],
];

foreach ($basicRoutes as $uri => $config) {
    Route::get($uri, fn() => view($config['view']))->name($config['name']);
}

$assessmentRoutes = [
    '/assessment' => ['view' => 'assessment/assessment', 'name' => 'assessment'],
    '/assessment/cyberbullying' => ['view' => 'assessment/cyberbullying/index', 'name' => 'cyberbullying'],
    '/assessment/cyberbullying/person_action' => ['view' => 'assessment/cyberbullying/person_action/person_action', 'name' => 'person_action'],
    '/assessment/cyberbullying/victim' => ['view' => 'assessment/cyberbullying/victim/victim', 'name' => 'victim'],
    '/assessment/cyberbullying/overview' => ['view' => 'assessment/cyberbullying/overview/overview', 'name' => 'overview'],
    '/assessment/mental_health' => ['view' => 'assessment/mental_health/mental_health', 'name' => 'mental_health'],
];

foreach ($assessmentRoutes as $uri => $config) {
    Route::get($uri, fn() => view($config['view']))->name($config['name']);
}

Route::prefix('assessment/cyberbullying')->group(function () {
    Route::get('person_action/form', [AssessmentController::class, 'showPersonActionForm'])->name('person_action/form');
    Route::post('person_action/form', [AssessmentController::class, 'submitPersonActionForm']);
    Route::get('person_action/result', [AssessmentController::class, 'showPersonActionResults'])->name('person_action/result');

    Route::get('victim/form', [AssessmentController::class, 'showVictimForm'])->name('victim/form');
    Route::post('victim/form', [AssessmentController::class, 'submitVictimForm']);
    Route::get('victim/result', [AssessmentController::class, 'showVictimResults'])->name('victim/result');

    Route::get('overview/form', [OverviewController::class, 'showForm'])->name('overview/form');
    Route::post('overview/form', [OverviewController::class, 'submitForm']);
    Route::get('overview/result', [OverviewController::class, 'showResults'])->name('overview/result');
});

Route::prefix('assessment/mental_health')->group(function () {
    Route::get('form', [MentalHealthController::class, 'showForm'])->name('mental_health/form');
    Route::post('form', [MentalHealthController::class, 'submitForm']);
    Route::get('result', [MentalHealthController::class, 'showResults'])->name('mental_health/result');
});

Route::get('/report_consultation', function () {
    return view('report&consultation.report&consultation');
})->name('report&consultation');

Route::get('/report_consultation/request_consultation', function () {
    return view('report&consultation.request_consultation.request_consultation');
})->name('request_consultation');

Route::get('/report_consultation/behavioral_report/result', function () {
    return view('report&consultation.behavioral_report.result');
})->name('result_report');

Route::get('/report_consultation/request_consultation/teacher', function () {
    return view('report&consultation.request_consultation.teacher.teacher');
})->name('teacher_report');

Route::get('/report_consultation/request_consultation/province', function () {
    return view('report&consultation.request_consultation.province.province');
})->name('province_report');

Route::get('/report_consultation/request_consultation/country', function () {
    return view('report&consultation.request_consultation.country.country');
})->name('country_report');

Route::get('/report_consultation/request_consultation/app_center', function () {
    return view('report&consultation.request_consultation.app_center.app_center');
})->name('app_center_report');

Route::prefix('report_consultation/safe_area')->group(function () {
    Route::get('/', fn() => view('report&consultation.safe_area.safe_area'))->name('safe_area');
    
    Route::get('voice/result', fn() => view('report&consultation.safe_area.voice.result'))->name('safe_area/voice/result');
    Route::get('message/result', fn() => view('report&consultation.safe_area.message.result'))->name('safe_area/message/result');
});

Route::prefix('safe-area')->name('safe-area.')->group(function () {
    Route::get('/voice', [SafeAreaVoiceController::class, 'index'])->name('voice');
    Route::post('/voice/store', [SafeAreaVoiceController::class, 'store'])->name('voice.store');
    
    Route::get('/message', [SafeAreaMessageController::class, 'index'])->name('message');
    Route::post('/message/store', [SafeAreaMessageController::class, 'store'])->name('message.store');
    
    Route::get('/stats', [SafeAreaStatsController::class, 'index'])->name('stats');
    Route::get('/stats/json', [SafeAreaStatsController::class, 'getStats'])->name('stats.json');
    Route::get('/export', [SafeAreaStatsController::class, 'export'])->name('export');
});

Route::get('/safe_area/voice', [SafeAreaVoiceController::class, 'index'])->name('safe_area/voice');
Route::get('/safe_area/message', [SafeAreaMessageController::class, 'index'])->name('safe_area/message');

Route::get('report_consultation/safe_area/voice', [SafeAreaVoiceController::class, 'index'])->name('report_consultation.safe_area.voice');
Route::get('report_consultation/safe_area/message', [SafeAreaMessageController::class, 'index'])->name('report_consultation.safe_area.message');


Route::get('/report&consultation/behavioral_report', [BehavioralReportController::class, 'index'])->name('behavioral-report.index');
Route::get('/report_consultation/behavioral_report', [BehavioralReportController::class, 'index'])->name('behavioral_report');
Route::post('/report&consultation/behavioral_report', [BehavioralReportController::class, 'store'])->name('behavioral-report.store');

Route::get('/main/game', fn() => view('game'))->name('main_game');
Route::get('/category/game', fn() => view('game/index'))->name('game');

Route::prefix('game')->group(function () {
    Route::get('1_1', [BullyingGameController::class, 'game1_1'])->name('game_1_1');
    Route::get('1_2', [BullyingGameController::class, 'game1_2'])->name('game_1_2');
    Route::get('1_3', [BullyingGameController::class, 'game1_3'])->name('game_1_3');
    Route::get('1_4', [BullyingGameController::class, 'game1_4'])->name('game_1_4');
    Route::get('4_1', [BullyingGameController::class, 'game4_1'])->name('game_4_1');
    Route::get('4_2', [BullyingGameController::class, 'game4_2'])->name('game_4_2');
    Route::get('5_1', [BullyingGameController::class, 'game5_1'])->name('game_5_1');
    Route::get('5_2', [BullyingGameController::class, 'game5_2'])->name('game_5_2');
    Route::get('custom', [BullyingGameController::class, 'customSequenceGame'])->name('game_custom');
});

$simpleGames = [2, 3, 6, 7, 8, 9, 10, 11, 12, 13, 14];
foreach ($simpleGames as $gameId) {
    Route::get("/game/{$gameId}", fn() => view("game/g_{$gameId}/index"))->name("game_{$gameId}");
}

Route::get('/main_video', [VideoController::class, 'mainVideo'])->name('main_video');

foreach ([1, 2, 3, 4, 5, 6, 7] as $lang) {
    Route::get("/main_video_language{$lang}",
        [VideoController::class, 'showVideos'])
        ->defaults('language', $lang)
        ->name("main_video_language{$lang}");
}

Route::prefix('infographic')->name('infographic.')->group(function () {
    Route::get('/', [InfographicController::class, 'index'])->name('index');
    Route::get('/{topicId}', [InfographicController::class, 'show'])->name('show');
    Route::get('/api/images/{topicId}', [InfographicController::class, 'getImages'])->name('api.images');
    Route::get('/api/check/{topicId}', [InfographicController::class, 'checkAvailability'])->name('api.check');
});

Route::get('/main_info', [InfographicController::class, 'index'])->name('main_info');

Route::prefix('scenario')->group(function () {
    Route::get('/', [ScenarioController::class, 'index'])->name('scenario.index');
    Route::get('completion', [ScenarioController::class, 'completion'])->name('scenario.completion');
    
    for ($i = 1; $i <= 13; $i++) {
        Route::get($i, [ScenarioController::class, "scenario{$i}"])->name("scenario_{$i}");
        Route::post("{$i}/submit", [ScenarioController::class, "submitScenario{$i}"])->name("scenario_{$i}.submit");
    }
});

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth', CheckRoleUser::class])->group(function () {
    Route::get('/test_login', [MainController::class, 'testLogin'])->name('test_login');
});

Route::get('/main_dashboard', [DashboardController::class, 'index'])->name('main.dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/assessment', [DashboardController::class, 'assessment'])->name('assessment-dashboard');
Route::get('/dashboard/behavioral-report', [DashboardController::class, 'behavioralReport'])->name('behavioral-report-dashboard');
Route::get('/dashboard/safe-area', [DashboardController::class, 'safeArea'])->name('safe-area-dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('safe-area')->name('safe-area.')->group(function () {
        Route::get('/dashboard', [SafeAreaStatsController::class, 'index'])->name('dashboard');
        Route::get('/statistics', [SafeAreaStatsController::class, 'getStats'])->name('statistics');
        Route::get('/export', [SafeAreaStatsController::class, 'export'])->name('export');
        Route::get('/chart-data', function() {
            return response()->json(\App\Models\SafeArea::selectRaw('
                DATE_FORMAT(created_at, "%Y-%m") as month,
                SUM(CASE WHEN JSON_EXTRACT(voice_message, "$[0][0]") = 1 THEN 1 ELSE 0 END) as voice_count,
                SUM(CASE WHEN JSON_EXTRACT(voice_message, "$[1][0]") = 1 THEN 1 ELSE 0 END) as message_count
            ')
            ->groupBy('month')
            ->orderBy('month')
            ->get());
        })->name('chart-data');
    });
});

Route::prefix('api')->name('api.')->group(function () {
    Route::prefix('safe-area')->name('safe-area.')->group(function () {
        Route::post('/voice', [SafeAreaVoiceController::class, 'store'])->name('voice.store');
        Route::post('/message', [SafeAreaMessageController::class, 'store'])->name('message.store');
        Route::get('/stats', [SafeAreaStatsController::class, 'getStats'])->name('stats');
        Route::get('/export', [SafeAreaStatsController::class, 'export'])->name('export');
    });
    
    Route::prefix('mental-health')->name('mental-health.')->group(function () {
        Route::post('/submit', [MentalHealthController::class, 'submitForm'])->name('submit');
        Route::get('/stats', function() {
            return response()->json([
                'total_assessments' => \App\Models\MentalHealthAssessment::count(),
                'high_risk' => \App\Models\MentalHealthAssessment::highRisk()->count(),
            ]);
        })->name('stats');
    });
});

if (app()->environment('local')) {
    Route::get('/check-view-structure', function() {
        $viewPath = resource_path('views');
        $expectedPath = $viewPath . '/assessment/cyberbullying/person_action/form';
        
        return response()->json([
            'base_views_path' => $viewPath,
            'expected_directory' => $expectedPath,
            'directory_exists' => is_dir($expectedPath),
            'directory_readable' => is_readable($expectedPath),
            'expected_file' => $expectedPath . '/result.blade.php',
            'file_exists' => file_exists($expectedPath . '/result.blade.php'),
        ]);
    });

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

    Route::get('/test-infographic-structure', function() {
        $basePath = public_path('images/infographic');
        $result = [];
        
        for ($topicId = 1; $topicId <= 6; $topicId++) {
            $topicPath = $basePath . '/' . $topicId;
            $images = [];
            
            if (File::exists($topicPath)) {
                $files = File::files($topicPath);
                
                foreach ($files as $file) {
                    if (in_array($file->getExtension(), ['png', 'jpg', 'jpeg', 'gif'])) {
                        $images[] = $file->getFilename();
                    }
                }
                
                usort($images, function($a, $b) {
                    $aNum = (int) pathinfo($a, PATHINFO_FILENAME);
                    $bNum = (int) pathinfo($b, PATHINFO_FILENAME);
                    return $aNum <=> $bNum;
                });
            }
            
            $result[$topicId] = [
                'path_exists' => File::exists($topicPath),
                'path' => $topicPath,
                'images' => $images,
                'count' => count($images)
            ];
        }
        
        return response()->json($result, 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    })->name('test.infographic.structure');

    Route::get('/test-safe-area', function() {
        $stats = \App\Models\SafeArea::getStatistics();
        $recentRecords = \App\Models\SafeArea::latest()->take(5)->get();
        
        return response()->json([
            'statistics' => $stats,
            'recent_records' => $recentRecords->map(function($record) {
                return [
                    'id' => $record->id,
                    'type' => $record->type,
                    'type_thai' => $record->type_thai,
                    'voice_message' => $record->voice_message,
                    'created_at' => $record->created_at->format('Y-m-d H:i:s'),
                ];
            }),
            'model_methods' => [
                'voice_count' => \App\Models\SafeArea::getVoiceCount(),
                'message_count' => \App\Models\SafeArea::getMessageCount(),
                'total_count' => \App\Models\SafeArea::getTotalCount(),
            ]
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    })->name('test.safe.area');

    Route::get('/test-safe-area-create', function() {
        $voice = \App\Models\SafeArea::createVoice();
        $message = \App\Models\SafeArea::createMessage();
        
        return response()->json([
            'voice_record' => [
                'id' => $voice->id,
                'type' => $voice->type,
                'voice_message' => $voice->voice_message,
            ],
            'message_record' => [
                'id' => $message->id,
                'type' => $message->type,
                'voice_message' => $message->voice_message,
            ],
            'updated_stats' => \App\Models\SafeArea::getStatistics()
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    })->name('test.safe.area.create');
}