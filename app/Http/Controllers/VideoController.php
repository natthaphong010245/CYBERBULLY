<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    private $languages = [
        1 => 'ไทย',
        2 => 'อาข่า', 
        3 => 'ลาหู่',
        4 => 'ม้ง',
        5 => 'เย้า',
        6 => 'กระเหรี่ยง',
        7 => 'ลีซู'
    ];

    public function selectLanguage()
    {
        return view('video.select_language', [
            'languages' => $this->languages
        ]);
    }

    public function showVideos($language)
    {
        if (!array_key_exists($language, $this->languages)) {
            abort(404);
        }

        $videos = $this->getVideosByLanguage($language);
        
        return view('video.show_videos', [
            'language' => $language,
            'languageName' => $this->languages[$language],
            'videos' => $videos
        ]);
    }

    private function getVideosByLanguage($language)
    {
        $allVideos = [
            1 => [ // ภาษาไทย
                [
                    'id' => 1,
                    'title' => 'รู้จัก Bullying การรังแก 4 ประเภท หลัก 3 จ. ที่เด็กต้องรู้',
                    'youtube_id' => 'fJwfh6GR03w',
                    'thumbnail' => $this->getYouTubeThumbnail('fJwfh6GR03w'),
                    'duration' => '02:18',
                    'category' => 'การรังแก'
                ],
                [
                    'id' => 2,
                    'title' => 'รู้จัก Cyber Bullying การรังแกทางไซเบอร์ 9 รูปแบบที่เด็กควรรู้ และหลัก 2A✨',
                    'youtube_id' => 'qNyWgnQul_s',
                    'thumbnail' => $this->getYouTubeThumbnail('qNyWgnQul_s'),
                    'duration' => '02:58',
                    'category' => 'การรังแกทางไซเบอร์'
                ],
                [
                    'id' => 3,
                    'title' => 'ผลกระทบของการรังแกทางออนไลน์ที่คุณต้องรู้ | คุณนายตำรวจเตือนภัย',
                    'youtube_id' => '2oUuSjwzgfQ',
                    'thumbnail' => $this->getYouTubeThumbnail('2oUuSjwzgfQ'),
                    'duration' => '01:09',
                    'category' => 'การรังแกทางไซเบอร์'
                ],
                [
                    'id' => 4,
                    'title' => 'สัญญาณเตือนภัย Warning Signal การรังแก ที่ผู้ปกครองและครูต้องรู้',
                    'youtube_id' => '9k_V7hp5lRA',
                    'thumbnail' => $this->getYouTubeThumbnail('9k_V7hp5lRA'),
                    'duration' => '00:55',
                    'category' => 'การรังแกทางไซเบอร์'
                ],
                [
                    'id' => 5,
                    'title' => 'สาเหตุของการรังแกกันทางไซเบอร์ Cyberbullying | รากเหง้าของปัญหาที่ต้องรู้',
                    'youtube_id' => 'VQFr4bg7FIc',
                    'thumbnail' => $this->getYouTubeThumbnail('VQFr4bg7FIc'),
                    'duration' => '02:37',
                    'category' => 'การรังแกทางไซเบอร์'
                ],
                [
                    'id' => 6,
                    'title' => 'วิธีการรับมือ Cyberbullying | 5 ขั้นตอน STOP BLOCK TELL REMOVE BE STRONG',
                    'youtube_id' => '67z5uTSghZ4',
                    'thumbnail' => $this->getYouTubeThumbnail('67z5uTSghZ4'),
                    'duration' => '03:30',
                    'category' => 'การรังแกทางไซเบอร์'
                ],
                [
                    'id' => 7,
                    'title' => 'การใช้คอมพิวเตอร์อย่างปลอดภัย ด้วยหลัก C.O.N.N.E.C.T | 7 ขั้นตอนสู่โลกดิจิทัลที่ปลอดภัย',
                    'youtube_id' => 'HH10Up0ZqNg',
                    'thumbnail' => $this->getYouTubeThumbnail('HH10Up0ZqNg'),
                    'duration' => '06:25',
                    'category' => 'การรังแกทางไซเบอร์'
                ],

            ],
            2 => [ // อาข่า
                
            ],
            3 => [ // ลาหู่
               
            ],

            4 => [ // ม้ง
               
            ],

            5 => [ // เย้า
               
            ],

            6 => [ // กระเหรี่ยง
        
               
            ],

            7 => [ // ลีซู
               
            ],
        ];

        return $allVideos[$language] ?? [
            [
                'id' => 0,
                'title' => "วิดีโอ{$this->languages[$language]} (กำลังอัพเดท)",
                'youtube_id' => 'fJwfh6GR03w',
                'thumbnail' => $this->getYouTubeThumbnail('fJwfh6GR03w'),
                'duration' => '00:00',
                'category' => 'ทั่วไป'
            ]
        ];
    }

    public function getYouTubeThumbnail($youtubeId, $quality = 'mqdefault')
    {
        $qualities = [
            'maxresdefault', // 1280x720 (HD)
            'sddefault',     // 640x480 (SD)
            'hqdefault',     // 480x360 (HQ)
            'mqdefault',     // 320x180 (MQ)
            'default'        // 120x90 (thumbnail)
        ];
        
        return "https://img.youtube.com/vi/{$youtubeId}/mqdefault.jpg";
    }

    public static function getYouTubeEmbedUrl($youtubeId)
    {
        return "https://www.youtube.com/embed/{$youtubeId}";
    }

    public function mainVideo()
    {
        return $this->selectLanguage();
    }
}