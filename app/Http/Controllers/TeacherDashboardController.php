<?php
//app/Http/Controllers/TeacherDashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        // Data for Behavioral Report Overview Summary (only วารีวิทยาคม)
        $overview = [
            'โรงเรียนวาวีวิทยาคม' => 10
        ];

        // Sample data for List Report Student - Extended to more entries to support 6 items per page
        $studentReports = collect([
            ['date' => '08/15/2025', 'message' => 'รายงานพฤติกรรมการกลั่นแกล้งทางไซเบอร์ ผู้ใช้ได้รับการคุกคามผ่านแอปพลิเคชัน'],
            ['date' => '09/20/2025', 'message' => 'เกิดเหตุการณ์การล้อเลียนในกลุ่มสื่อสังคมออนไลน์ ส่งผลให้ผู้ถูกกระทำมีความเครียด'],
            ['date' => '10/14/2025', 'message' => 'การแชร์ภาพส่วนตัวโดยไม่ได้รับอนุญาต เพื่อการดูหมิ่นและสร้างความอับอาย'],
            ['date' => '10/14/2025', 'message' => 'ข้อความคุกคามและการใช้ภาษาที่ไม่เหมาะสมในแชทกลุ่ม'],
            ['date' => '10/13/2025', 'message' => 'การสร้างบัญชีปลอมเพื่อติดตามและคุกคามเหยื่อ'],
            ['date' => '10/13/2025', 'message' => 'การกระทำที่มีเจตนาทำร้ายจิตใจผ่านการส่งข้อความที่ไม่เหมาะสม'],
            ['date' => '10/12/2025', 'message' => 'เหตุการณ์การล้อเลียนในคลาสออนไลน์ ทำให้นักเรียนไม่กล้าเปิดกล้อง'],
            ['date' => '10/12/2025', 'message' => 'การแพร่ข่าวลือเท็จเพื่อทำลายชื่อเสียงในสื่อสังคมออนไลน์'],
            ['date' => '10/11/2025', 'message' => 'การใช้ข้อมูลส่วนบุคคลไปในทางที่ผิดเพื่อคุกคาม'],
            ['date' => '10/11/2025', 'message' => 'เหตุการณ์การกีดกันทางสังคมในกลุ่มออนไลน์'],
            ['date' => '10/10/2025', 'message' => 'การส่งข้อความคุกคามอย่างต่อเนื่องเป็นเวลาหลายวัน'],
            ['date' => '10/10/2025', 'message' => 'การเปิดเผยข้อมูลส่วนตัวโดยไม่ได้รับอนุญาต'],
            ['date' => '10/09/2025', 'message' => 'เหตุการณ์การดูหมิ่นเหยียดหยามในห้องแชทสาธารณะ'],
            ['date' => '10/09/2025', 'message' => 'การใช้ภาพที่ไม่เหมาะสมเพื่อล้อเลียนและดูหมิ่น'],
            ['date' => '10/08/2025', 'message' => 'การสร้างมีมเพื่อล้อเลียนเหยื่อและแชร์ในวงกว้าง'],
            ['date' => '10/08/2025', 'message' => 'เหตุการณ์การคุกคามผ่านแอปพลิเคชันส่งข้อความ'],
            ['date' => '10/07/2025', 'message' => 'การติดตามและคุกคามผ่านหลายแพลตฟอร์ม'],
            ['date' => '10/07/2025', 'message' => 'เหตุการณ์การใช้ความรุนแรงทางคำพูดในการสื่อสาร'],
        ]);

        // Sample data for school report (single line chart)
        $schoolReportData = [8, 12, 10, 15, 18, 14, 16, 12, 8, 6, 4, 7]; // Monthly data

        $data = [
            'overview' => $overview,
            'student_reports' => $studentReports,
            'school_report_data' => $schoolReportData,
            'school_name' => 'โรงเรียนวาวีวิทยาคม'
        ];

        return view('teacher.dashboard.index', compact('data'));
    }

    public function behavioralReport(Request $request)
    {
        $statusFilter = $request->get('status');
        $page = (int) $request->get('page', 1);
        $perPage = 15; // Show 15 items instead of 7
        
        // Mock data for teacher behavioral report - same structure as researcher but 15 items per page
        $allReports = collect([
            ['id' => 1, 'date' => '10/15/2025', 'message' => 'รายงานพฤติกรรมการกลั่นแกล้งทางไซเบอร์ ผู้ใช้ได้รับการคุกคามผ่านแอปพลิเคชัน', 'status' => 'pending'],
            ['id' => 2, 'date' => '10/15/2025', 'message' => 'เกิดเหตุการณ์การล้อเลียนในกลุ่มสื่อสังคมออนไลน์ ส่งผลให้ผู้ถูกกระทำมีความเครียด', 'status' => 'reviewed'],
            ['id' => 3, 'date' => '10/14/2025', 'message' => 'การแชร์ภาพส่วนตัวโดยไม่ได้รับอนุญาต เพื่อการดูหมิ่นและสร้างความอับอาย', 'status' => 'pending'],
            ['id' => 4, 'date' => '10/14/2025', 'message' => 'ข้อความคุกคามและการใช้ภาษาที่ไม่เหมาะสมในแชทกลุ่ม', 'status' => 'reviewed'],
            ['id' => 5, 'date' => '10/13/2025', 'message' => 'การสร้างบัญชีปลอมเพื่อติดตามและคุกคามเหยื่อ', 'status' => 'pending'],
            ['id' => 6, 'date' => '10/13/2025', 'message' => 'การกระทำที่มีเจตนาทำร้ายจิตใจผ่านการส่งข้อความที่ไม่เหมาะสม', 'status' => 'reviewed'],
            ['id' => 7, 'date' => '10/12/2025', 'message' => 'เหตุการณ์การล้อเลียนในคลาสออนไลน์ ทำให้นักเรียนไม่กล้าเปิดกล้อง', 'status' => 'pending'],
            ['id' => 8, 'date' => '10/12/2025', 'message' => 'การแพร่ข่าวลือเท็จเพื่อทำลายชื่อเสียงในสื่อสังคมออนไลน์', 'status' => 'reviewed'],
            ['id' => 9, 'date' => '10/11/2025', 'message' => 'การใช้ข้อมูลส่วนบุคคลไปในทางที่ผิดเพื่อคุกคาม', 'status' => 'pending'],
            ['id' => 10, 'date' => '10/11/2025', 'message' => 'เหตุการณ์การกีดกันทางสังคมในกลุ่มออนไลน์', 'status' => 'reviewed'],
            ['id' => 11, 'date' => '10/10/2025', 'message' => 'การส่งข้อความคุกคามอย่างต่อเนื่องเป็นเวลาหลายวัน', 'status' => 'pending'],
            ['id' => 12, 'date' => '10/10/2025', 'message' => 'การเปิดเผยข้อมูลส่วนตัวโดยไม่ได้รับอนุญาต', 'status' => 'reviewed'],
            ['id' => 13, 'date' => '10/09/2025', 'message' => 'เหตุการณ์การดูหมิ่นเหยียดหยามในห้องแชทสาธารณะ', 'status' => 'pending'],
            ['id' => 14, 'date' => '10/09/2025', 'message' => 'การใช้ภาพที่ไม่เหมาะสมเพื่อล้อเลียนและดูหมิ่น', 'status' => 'reviewed'],
            ['id' => 15, 'date' => '10/08/2025', 'message' => 'การสร้างมีมเพื่อล้อเลียนเหยื่อและแชร์ในวงกว้าง', 'status' => 'pending'],
            ['id' => 16, 'date' => '10/08/2025', 'message' => 'เหตุการณ์การคุกคามผ่านแอปพลิเคชันส่งข้อความ', 'status' => 'reviewed'],
            ['id' => 17, 'date' => '10/07/2025', 'message' => 'การติดตามและคุกคามผ่านหลายแพลตฟอร์ม', 'status' => 'pending'],
            ['id' => 18, 'date' => '10/07/2025', 'message' => 'เหตุการณ์การใช้ความรุนแรงทางคำพูดในการสื่อสาร', 'status' => 'reviewed'],
            ['id' => 19, 'date' => '10/06/2025', 'message' => 'การแฮกบัญชีเพื่อส่งข้อความคุกคามในนามเหยื่อ', 'status' => 'pending'],
            ['id' => 20, 'date' => '10/06/2025', 'message' => 'การใช้ข้อมูลที่เป็นเท็จเพื่อสร้างความเสียหาย', 'status' => 'reviewed'],
            ['id' => 21, 'date' => '10/05/2025', 'message' => 'เหตุการณ์การล้อเลียนรูปร่างหน้าตาในโซเชียลมีเดีย', 'status' => 'pending'],
            ['id' => 22, 'date' => '10/05/2025', 'message' => 'การส่งข้อความที่มีเจตนาทำร้ายจิตใจอย่างต่อเนื่อง', 'status' => 'reviewed'],
            ['id' => 23, 'date' => '10/04/2025', 'message' => 'การใช้คำพูดที่ไม่สุภาพและคุกคามในแชทกลุ่ม', 'status' => 'pending'],
            ['id' => 24, 'date' => '10/04/2025', 'message' => 'เหตุการณ์การกีดกันและไม่ให้เข้าร่วมกิจกรรมออนไลน์', 'status' => 'reviewed'],
            ['id' => 25, 'date' => '10/03/2025', 'message' => 'การแชร์ข้อมูลส่วนตัวเพื่อให้คนอื่นไปคุกคาม', 'status' => 'pending'],
            ['id' => 26, 'date' => '10/03/2025', 'message' => 'เหตุการณ์การล้อเลียนความสามารถทางการเรียน', 'status' => 'reviewed'],
            ['id' => 27, 'date' => '10/02/2025', 'message' => 'การใช้ภาษาที่หยาบคายและไม่เหมาะสมในการสื่อสาร', 'status' => 'pending'],
            ['id' => 28, 'date' => '10/02/2025', 'message' => 'การส่งข้อความคุกคามผ่านหลายช่องทางพร้อมกัน', 'status' => 'reviewed'],
            ['id' => 29, 'date' => '10/01/2025', 'message' => 'เหตุการณ์การดูหมิ่นเรื่องสถานะทางเศรษฐกิจ', 'status' => 'pending'],
            ['id' => 30, 'date' => '10/01/2025', 'message' => 'การใช้ข้อมูลเท็จเพื่อทำลายชื่อเสียงของเหยื่อ', 'status' => 'reviewed'],
        ]);

        // Filter by status if provided
        $originalCount = $allReports->count();
        
        if ($statusFilter && $statusFilter !== '') {
            $allReports = $allReports->filter(function($report) use ($statusFilter) {
                return $report['status'] === $statusFilter;
            })->values();
        }

        // Paginate
        $total = $allReports->count();
        $totalPages = $total > 0 ? ceil($total / $perPage) : 1;
        if ($page > $totalPages) {
            $page = 1;
        }
        
        $reports = $allReports->skip(($page - 1) * $perPage)->take($perPage)->values();

        $data = [
            'reports' => $reports,
            'pagination' => [
                'current_page' => $page,
                'total_pages' => $totalPages,
                'total' => $total,
                'per_page' => $perPage,
                'has_more_pages' => $page < $totalPages,
                'from' => $total > 0 ? (($page - 1) * $perPage) + 1 : 0,
                'to' => min($page * $perPage, $total)
            ],
            'current_filter' => $statusFilter,
            'total_before_filter' => $originalCount
        ];

        if ($request->ajax()) {
            return response()->json($data);
        }

        return view('teacher.dashboard.behavioral-report', compact('data'));
    }

    public function updateReportStatus(Request $request, $id)
    {
        // In real application, update the database
        return response()->json(['success' => true, 'message' => 'สถานะได้รับการอัปเดตแล้ว']);
    }

    public function getReportDetail($id)
    {
        // Mock report detail data
        return response()->json([
            'id' => $id,
            'date' => '10/15/2025',
            'message' => 'รายงานพฤติกรรมการกลั่นแกล้งทางไซเบอร์ ผู้ใช้ได้รับการคุกคามผ่านแอปพลิเคชัน',
            'images' => [
                'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80',
                'https://images.unsplash.com/photo-1439066615861-d1af74d74000?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
            ],
            'audio' => 'audio_' . $id . '.mp3',
            'location' => 'Thailand',
            'status' => 'pending'
        ]);
    }
}