<button id="infoBtn"
    class="absolute top-4 right-4 h-8 w-8 flex items-center justify-center rounded-full bg-white text-gray-700 shadow-md">
    <span class="text-lg font-bold">i</span>
</button>
<div id="infoModal" class="modal fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-black bg-opacity-30" id="modalOverlay"></div>
    <div
        class="modal-content bg-white w-11/12 max-w-xl mx-auto rounded-lg shadow-lg z-50 transform scale-100 transition-transform duration-300">
        <div class="flex justify-between items-center p-4 relative mt-2 mr-2">
            <button id="closeBtn"
                class="h-8 w-8 flex items-center justify-center rounded-full text-gray-500 hover:text-gray-700 absolute top-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-2 overflow-y-auto flex flex-col justify-between">
            <h3 class="font-bold text-center mt-auto text-[18px] text-gray-700">เกี่ยวกับเรา</h3>
        </div>

        <div class="modal-body p-4">
            <p class="mb-6 text-[12px] text-justify" style="text-indent: 2em;">
                ศูนย์บริการสุขภาพแบบครบวงจรภายใต้การกำกับดูแลของสำนักวิชาวิทยาศาสตร์สุขภาพ
                มหาวิทยาลัยแม่ฟ้าหลวงเป็นศูนย์บริการที่เปิดให้บริการแก่นักศึกษาและบุคลากรของมหาวิทยาลัย
                ทุกคนให้ได้รับการดูแลคุณภาพชีวิตและสุขภาพการวิจัยและการให้บริการ ปีงบประมาณ 2568 เตรียมพร้อม
                และพัฒนาสิ่งแวดล้อมในสถานที่ทำงานให้มีความปลอดภัยสะอาดเป็นระเบียบ
                และเพียงพอต่อความต้องการของผู้ใช้บริการอีกทั้งสร้างวัฒนธรรมองค์กรขององค์การให้บริการสุขภาพแบบองค์รวม
                โดยนำหลักธรรมาภิบาลมาบริหารงานอย่างมีคุณธรรม จริยธรรม และคุณภาพอย่างยั่งยืน
            </p>

            <div class="flex justify-center space-x-3 mb-8 border-b border-gray-300 pb-4">
                <img src="/images/วช2.png" alt="Certification 1" class="h-11 w-11 object-contain">
                <img src="/images/MFU.png" alt="Certification 2" class="h-11 w-11 object-contain">
                <img src="/images/สาธาmfu.png" alt="Certification 3" class="h-11 w-11 object-contain">
                <img src="/images/excellence.png" alt="Certification 4" class="h-11 w-11 object-contain">
                <img src="/images/ตรากระทรวงสาธารณสุขใหม่.png" alt="Certification 5" class="h-11 w-11 object-contain">
            </div>

            <div class="mt-2">
                <p class="font-bold text-center text-[14px] text-gray-600">คณะบริหาร</p>

                <div class="p-3 text-center">
                    <p class="text-[14px] font-medium">อาจารย์ ดร.ฐาปกรณ์ เรือนใจ</p>
                    <p class="text-[12px]">
                        สาขาวิชาสาธารณสุขศาสตร์ และศูนย์ความเป็นเลิศการวิจัยสุขภาพชนชาติพันธุ์
                    </p>
                    <p class="text-[12px]">
                        สำนักวิชาวิทยาศาสตร์สุขภาพ มหาวิทยาลัยแม่ฟ้าหลวง
                    </p>
                </div>

                <div class="p-3 text-center">
                    <p class="text-[14px] font-medium">อาจารย์ ฐิตาพร แก้วบุญชู</p>
                    <p class="text-[12px]">
                        สาขาวิชาสาธารณสุขศาสตร์ สำนักวิชาวิทยาศาสตร์สุขภาพ
                    </p>
                    <p class="text-[12px]">
                        มหาวิทยาลัยแม่ฟ้าหลวง
                    </p>
                </div>

                <div class="p-3 text-center">
                    <p class="text-[14px] font-medium">อาจารย์ ดร.วิลาวัณย์ ไชยอุต</p>
                    <p class="text-[12px]">
                        สาขาวิชากายภาพบำบัด สำนักวิชาการแพทย์บูรณาการ
                    </p>
                    <p class="text-[12px]">
                        มหาวิทยาลัยแม่ฟ้าหลวง
                    </p>
                </div>

                <div class="p-3 text-center">
                    <p class="text-[14px] font-medium">นางสาวฟาติมา ยีหมาด</p>
                    <p class="text-[12px]">
                        สาขาวิชากายภาพบำบัด สำนักวิชาการแพทย์บูรณาการ
                    </p>
                    <p class="text-[12px]">
                        มหาวิทยาลัยแม่ฟ้าหลวง
                    </p>
                </div>

                <div class="p-3 text-center">
                    <p class="text-[14px] font-medium">อาจารย์ ดร.ขวัญตา คีรีมาศทอง</p>
                    <p class="text-[12px]">
                        สำนักวิชาเทคโนโลยีดิจิทัลประยุกต์ และสถาบันนวัตกรรมการเรียนรู้
                    </p>
                    <p class="text-[12px]">
                        มหาวิทยาลัยแม่ฟ้าหลวง
                    </p>
                </div>

                <p class="mt-8 font-bold text-center text-[14px] text-gray-600">ที่ปรึกษาโครงการวิจัย</p>

                <div class="p-3 text-center">
                    <p class="text-[14px] font-medium">รองศาสตราจารย์ ดร.ธวัชชัย อภิเดชกุล</p>
                    <p class="text-[12px]">
                        สาขาวิชาสาธารณสุขศาสตร์ และศูนย์ความเป็นเลิศการวิจัยสุขภาพชนชาติพันธุ์
                    </p>
                    <p class="text-[12px]">
                        สำนักวิชาวิทยาศาสตร์สุขภาพ มหาวิทยาลัยแม่ฟ้าหลวง
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
