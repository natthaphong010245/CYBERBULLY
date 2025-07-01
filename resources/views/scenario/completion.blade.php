<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUTH CYBERSAFE</title>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'K2D', sans-serif;
            background: linear-gradient(to bottom, #E5C8F6 0%, #929AFF 40%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        .completion-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 20px;
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .completion-modal.show {
            opacity: 1;
            transform: scale(1);
        }

        .modal-content {
            background: white;
            border-radius: 24px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalSlideIn 0.6s ease-out;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .bullying-type {
            background: linear-gradient(135deg, #f8f9ff 0%, #e8edff 100%);
            border-left: 4px solid #8B7FE8;
            padding: 16px;
            margin-bottom: 16px;
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .bullying-type:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(139, 127, 232, 0.2);
        }

        .bullying-title {
            color: #5A63D7;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .bullying-description {
            color: #4A5568;
            font-size: 14px;
            line-height: 1.6;
        }

        .celebration-icon {
            background: linear-gradient(135deg, #8B7FE8 0%, #9B8BF5 100%);
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: 0 auto 20px;
            animation: celebrationPulse 2s infinite;
        }

        @keyframes celebrationPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .completion-button {
            background: linear-gradient(135deg, #8B7FE8 0%, #9B8BF5 100%);
            color: white;
            padding: 14px 32px;
            border-radius: 16px;
            font-weight: 600;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        .completion-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 127, 232, 0.4);
        }

        .scroll-container {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .scroll-container::-webkit-scrollbar {
            width: 6px;
        }

        .scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .scroll-container::-webkit-scrollbar-thumb {
            background: #8B7FE8;
            border-radius: 10px;
        }

        .scroll-container::-webkit-scrollbar-thumb:hover {
            background: #7C6FE0;
        }
    </style>
</head>
<body>
    <!-- Demo Button เพื่อทดสอบ Modal -->
    <div class="flex items-center justify-center min-h-screen">
        <button onclick="showCompletionModal()" class="completion-button">
            แสดง Modal เสร็จสิ้น (Demo)
        </button>
    </div>

    <!-- Completion Modal -->
    <div id="completionModal" class="completion-modal">
        <div class="modal-content">
            <!-- Header -->
            <div class="text-center p-8 pb-4">
                <div class="celebration-icon">
                    🎉
                </div>
                <h1 class="text-3xl font-bold text-[#3E36AE] mb-4">
                    ยินดีด้วย! 
                </h1>
                <h2 class="text-xl font-semibold text-[#5A63D7] mb-2">
                    คุณได้เล่นครบทุกสถานการณ์แล้ว
                </h2>
                <p class="text-[#6B7280] text-base">
                    ตอนนี้คุณรู้จักรูปแบบของไซเบอร์บูลลี่และวิธีรับมือแล้ว
                </p>
            </div>

            <!-- Content -->
            <div class="px-8 pb-8">
                <h3 class="text-xl font-bold text-[#3E36AE] mb-6 text-center">
                    รูปแบบของไซเบอร์บูลลี่ที่พบบ่อย
                </h3>

                <div class="scroll-container">
                    <div class="bullying-type">
                        <div class="bullying-title">1. การคุกคาม (Harassment)</div>
                        <div class="bullying-description">
                            การส่งข้อความที่หยาบคาย น่ารังเกียจ หรือดูหมิ่นซ้ำๆ
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">2. การใส่ร้าย (Denigration/Dissing)</div>
                        <div class="bullying-description">
                            การเผยแพร่ข้อมูลเท็จหรือข่าวลือเกี่ยวกับผู้อื่นเพื่อทำลายชื่อเสียง
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">3. การแอบอ้างตัวตน (Impersonation)</div>
                        <div class="bullying-description">
                            การแฮกบัญชีออนไลน์ของผู้อื่นและใช้ในทางที่เสียหาย
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">4. การกีดกัน (Exclusion)</div>
                        <div class="bullying-description">
                            การตั้งใจไม่รวมใครบางคนออกจากกลุ่มเพื่อนหรือกิจกรรมออนไลน์
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">5. การเผยแพร่ความลับ (Outing)</div>
                        <div class="bullying-description">
                            การเปิดเผยข้อมูลส่วนตัวหรือความลับของผู้อื่นโดยไม่ได้รับอนุญาต
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">6. การหลอกลวง (Trickery)</div>
                        <div class="bullying-description">
                            การใช้อุบายเพื่อให้เหยื่อเปิดเผยข้อมูลส่วนตัวแล้วนำไปเผยแพร่
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">7. การข่มขู่คุกคาม (Threatening/Intimidation)</div>
                        <div class="bullying-description">
                            การส่งข้อความที่ขู่ทำร้ายหรือคุกคาม
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">8. การสร้างกลุ่มเพื่อโจมตี (Flaming)</div>
                        <div class="bullying-description">
                            การสร้างกลุ่มหรือเพจเพื่อโจมตีหรือประจานบุคคล
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">9. การตัดต่อภาพหรือวิดีโอ (Photo/Video Manipulation)</div>
                        <div class="bullying-description">
                            การตัดต่อภาพหรือวิดีโอของผู้อื่นให้เกิดความเสียหาย
                        </div>
                    </div>

                    <div class="bullying-type">
                        <div class="bullying-title">10. การเผยแพร่คลิปวิดีโอหรือรูปภาพที่ส่อไปในทางเสียหาย</div>
                        <div class="bullying-description">
                            การนำคลิปหรือรูปภาพที่ทำให้ผู้อื่นอับอายหรือเสียหายไปเผยแพร่
                        </div>
                    </div>
                </div>

                <!-- จำไว้เสมอ -->
                <div class="mt-8 p-6 bg-gradient-to-r from-[#E5C8F6] to-[#D1D5FF] rounded-2xl">
                    <h4 class="font-bold text-[#3E36AE] text-lg mb-3 text-center">💡 จำไว้เสมอ</h4>
                    <div class="text-[#5A63D7] text-center space-y-2">
                        <p><strong>STOP</strong> - หยุดและไม่ตอบโต้</p>
                        <p><strong>BLOCK</strong> - ปิดกั้นผู้กระทำผิด</p>
                        <p><strong>TELL</strong> - บอกผู้ใหญ่ที่ไว้ใจ</p>
                        <p><strong>BE STRONG</strong> - เข้มแข็งและมั่นใจในตัวเอง</p>
                    </div>
                </div>

                <!-- ปุ่มกลับหน้าหลัก -->
                <div class="text-center mt-8">
                    <button onclick="goToHome()" class="completion-button">
                        กลับสู่หน้าหลัก
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showCompletionModal() {
            const modal = document.getElementById('completionModal');
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.classList.add('show');
            }, 100);
        }

        function goToHome() {
            // ใน Laravel จริงจะใช้ route
            // window.location.href = "{{ route('main') }}";
            
            // สำหรับ demo
            alert('กำลังกลับสู่หน้าหลัก...');
            
            // ปิด modal
            const modal = document.getElementById('completionModal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        }

        // แสดง modal อัตโนมัติเมื่อโหลดหน้า (สำหรับ demo)
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(showCompletionModal, 1000);
        });
    </script>
</body>
</html>