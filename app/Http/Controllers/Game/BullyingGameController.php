<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;

class BullyingGameController extends Controller
{
    private function getGameData()
    {
        return [
            '1_1' => [
                'nextRoute' => route('game_1_2'),
                'showIntroModal' => true,
                'scenarioImage' => 'physical_bullying.png',
                'altText' => 'Physical Bullying Scenario',
                'correctAnswerText' => 'การรังแกทางกาย',
                'answerOptions' => [
                    ['value' => 'physical', 'label' => 'กาย', 'correct' => true],
                    ['value' => 'verbal', 'label' => 'วาจา', 'correct' => false],
                    ['value' => 'social', 'label' => 'สังคม', 'correct' => false],
                    ['value' => 'cyber', 'label' => 'ไซเบอร์', 'correct' => false],
                ]
            ],
            '1_2' => [
                'nextRoute' => route('game_1_3'),
                'showIntroModal' => false,
                'scenarioImage' => 'verbal_bullying.png',
                'altText' => 'Verbal Bullying Scenario',
                'correctAnswerText' => 'การรังแกทางวาจา',
                'answerOptions' => [
                    ['value' => 'physical', 'label' => 'กาย', 'correct' => false],
                    ['value' => 'verbal', 'label' => 'วาจา', 'correct' => true],
                    ['value' => 'social', 'label' => 'สังคม', 'correct' => false],
                    ['value' => 'cyber', 'label' => 'ไซเบอร์', 'correct' => false],
                ]
            ],
            '1_3' => [
                'nextRoute' => route('game_1_4'),
                'showIntroModal' => false,
                'scenarioImage' => 'social_bullying.png',
                'altText' => 'Social Bullying Scenario',
                'correctAnswerText' => 'การรังแกทางสังคม',
                'answerOptions' => [
                    ['value' => 'physical', 'label' => 'กาย', 'correct' => false],
                    ['value' => 'verbal', 'label' => 'วาจา', 'correct' => false],
                    ['value' => 'social', 'label' => 'สังคม', 'correct' => true],
                    ['value' => 'cyber', 'label' => 'ไซเบอร์', 'correct' => false],
                ]
            ],
            '1_4' => [
                'nextRoute' => route('game_2'),
                'showIntroModal' => false,
                'scenarioImage' => 'cyber_bullying.png',
                'altText' => 'Cyber Bullying Scenario',
                'correctAnswerText' => 'การรังแกทางไซเบอร์',
                'answerOptions' => [
                    ['value' => 'physical', 'label' => 'กาย', 'correct' => false],
                    ['value' => 'verbal', 'label' => 'วาจา', 'correct' => false],
                    ['value' => 'social', 'label' => 'สังคม', 'correct' => false],
                    ['value' => 'cyber', 'label' => 'ไซเบอร์', 'correct' => true],
                ]
            ]
        ];
    }

    // ★ method สำหรับเกม 4 - แก้ไขแล้ว ★
    private function getGame4Data()
    {
        return [
            '4_1' => [
                'totalPairs' => 4,
                'showFifthPair' => false,
                'showIntroModal' => true,  // ★ เพิ่ม intro modal สำหรับ 4_1 ★
                'correctMatches' => [
                    '1' => '2', // การปะทะคารม -> การปกปิดการณม
                    '2' => '1', // การก่อกวน -> การกล่อมหม  
                    '3' => '4', // การใส่ร้ายป้ายสี -> การใส่ร้าย ป้ายสี
                    '4' => '3'  // สวมรอยเป็นคนอื่น -> รวมรอบ เป็นคนซัน
                ],
                'nextRoute' => route('game_4_2')
            ],
            '4_2' => [
                'totalPairs' => 5,
                'showFifthPair' => true,
                'showIntroModal' => false, // ★ ไม่มี intro modal สำหรับ 4_2 ★
                'correctMatches' => [
                    '1' => '2', // การปะทะคารม -> การปกปิดการณม
                    '2' => '1', // การก่อกวน -> การกล่อมหม  
                    '3' => '4', // การใส่ร้ายป้ายสี -> การใส่ร้าย ป้ายสี
                    '4' => '3', // สวมรอยเป็นคนอื่น -> รวมรอบ เป็นคนซัน
                    '5' => '5'  // การข่มเหงทางออนไลน์ -> การข่มเหงทางออนไลน์
                ],
                'nextRoute' => route('game_5_1') // ★ เปลี่ยนเป็นไปเกม 5_1 ★
            ]
        ];
    }

    // ★ เพิ่ม method สำหรับเกม 5 ★
    private function getGame5Data()
    {
        return [
            '5_1' => [
                'showIntroModal' => true,
                'gameTitle' => 'การกลั่นแกล้งแบบดั้งเดิม',
                'gameSubtitle' => 'TRADITIONAL',
                'scenarioImage' => 'traditional.png',
                'altText' => 'Traditional Bullying Scenario',
                
                // Layout configuration
                'totalSlots' => 3,
                'slotColumns' => 'grid-cols-3',
                'slotClass' => 'aspect-square',
                'slotContainerClass' => 'max-w-lg mx-auto',
                
                'characterColumns' => 'grid-cols-3',
                'characterClass' => 'aspect-square',
                'characterContainerClass' => 'max-w-lg mx-auto',
                
                // Game data
                'characters' => [
                    ['key' => 'bully', 'main' => 'ผู้รังแก', 'sub' => 'BULLY', 'position' => 1],
                    ['key' => 'victim', 'main' => 'ผู้ถูกรังแก', 'sub' => 'VICTIM', 'position' => 2],
                    ['key' => 'bystander', 'main' => 'ผู้เห็นเหตุการณ์', 'sub' => 'BYSTANDER', 'position' => 3]
                ],
                'availableOptions' => ['bully', 'victim', 'bystander'],
                'correctSequence' => ['bully', 'victim', 'bystander'],
                
                // Navigation
                'nextRoute' => route('game_5_2'),
                'skipRoute' => route('game_5_2') // ★ แก้ไข: ข้ามไปเกม 5_2 ★
            ],
            '5_2' => [
                'showIntroModal' => false,
                'gameTitle' => 'การกลั่นแกล้งแบบดั้งเดิม',
                'gameSubtitle' => 'CYBERBULLYING',
                'scenarioImage' => 'cyberbullying.png',
                'altText' => 'Cyberbullying Scenario',
                
                // Layout configuration
                'totalSlots' => 2,
                'slotColumns' => 'grid-cols-2',
                'slotClass' => 'h-20',
                'slotContainerClass' => 'max-w-xs mx-auto',
                
                'characterColumns' => 'grid-cols-2',
                'characterClass' => 'h-20',
                'characterContainerClass' => 'max-w-xs mx-auto',
                
                // Game data
                'characters' => [
                    ['key' => 'bully', 'main' => 'ผู้รังแก', 'sub' => 'BULLY', 'position' => 1],
                    ['key' => 'victim', 'main' => 'ผู้ถูกรังแก', 'sub' => 'VICTIM', 'position' => 2]
                ],
                'availableOptions' => ['bully', 'victim'],
                'correctSequence' => ['bully', 'victim'],
                
                // Navigation
                'nextRoute' => route('game_6'),
                'skipRoute' => route('game_6') // ★ แก้ไข: ข้ามไปเกม 6 ★
            ]
        ];
    }

    public function show($stage)
    {
        $gameData = $this->getGameData();
        
        if (!isset($gameData[$stage])) {
            abort(404);
        }

        return view('game.g_1.index', $gameData[$stage]);
    }

    // ★ method สำหรับจัดการเกม 4 ★
    public function showGame4($stage)
    {
        $gameData = $this->getGame4Data();
        
        if (!isset($gameData[$stage])) {
            abort(404);
        }

        return view('game.g_4.index', $gameData[$stage]);
    }

    // ★ เพิ่ม method สำหรับจัดการเกม 5 ★
    public function showGame5($stage)
    {
        $gameData = $this->getGame5Data();
        
        if (!isset($gameData[$stage])) {
            abort(404);
        }

        return view('game.g_5.index', $gameData[$stage]);
    }

    // เกม 1 methods (เดิม)
    public function game1_1()
    {
        return $this->show('1_1');
    }

    public function game1_2()
    {
        return $this->show('1_2');
    }

    public function game1_3()
    {
        return $this->show('1_3');
    }

    public function game1_4()
    {
        return $this->show('1_4');
    }

    // ★ เกม 4 methods ★
    public function game4_1()
    {
        return $this->showGame4('4_1');
    }

    public function game4_2()
    {
        return $this->showGame4('4_2');
    }

    // ★ เพิ่ม เกม 5 methods ★
    public function game5_1()
    {
        return $this->showGame5('5_1');
    }

    public function game5_2()
    {
        return $this->showGame5('5_2');
    }
}