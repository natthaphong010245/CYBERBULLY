{{-- resources/views/dashboard/behavioral-report.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Behavioral Report - Youth Cybersafe')
@section('page-title', 'Behavioral Report')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="chart-container">
            <h6><strong>Behavioral Report</strong></h6>
            <p class="text-muted small">Overview Summary</p>
            <div class="row">
                <div class="col-md-2_4">
                    <div class="stat-card stat-card-blue">
                        <div class="stat-icon stat-icon-blue">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="stat-number">{{ $data['overview']['นักวิจัย'] }}</div>
                        <div class="stat-label">นักวิจัย</div>
                    </div>
                </div>
                <div class="col-md-2_4">
                    <div class="stat-card stat-card-pink">
                        <div class="stat-icon stat-icon-pink">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="stat-number">{{ $data['overview']['โรงเรียนวาวีวิทยาคม'] }}</div>
                        <div class="stat-label">วารีวิทยาคม</div>
                    </div>
                </div>
                <div class="col-md-2_4">
                    <div class="stat-card stat-card-orange">
                        <div class="stat-icon stat-icon-orange">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="stat-number">{{ $data['overview']['โรงเรียนสหศาสตร์ศึกษา'] }}</div>
                        <div class="stat-label">สหศาสตร์ศึกษา</div>
                    </div>
                </div>
                <div class="col-md-2_4">
                    <div class="stat-card stat-card-green">
                        <div class="stat-icon stat-icon-green">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="stat-number">{{ $data['overview']['โรงเรียนราชประชานุเคราะห์ 62'] }}</div>
                        <div class="stat-label">ราชประชานุเคราะห์ 62</div>
                    </div>
                </div>
                <div class="col-md-2_4">
                    <div class="stat-card stat-card-purple">
                        <div class="stat-icon stat-icon-purple">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="stat-number">{{ $data['overview']['โรงเรียนห้วยไร่สามัคคี'] }}</div>
                        <div class="stat-label">ห้วยไร่สามัคคี</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <div class="chart-container">
            <h6><strong>Schools in Chiang Rai Province</strong></h6>
            <p class="text-muted small">Report</p>
            <div style="height: 450px; position: relative;">
                <canvas id="schoolsChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="chart-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h6><strong>Report to Researchers</strong></h6>
                    <p class="text-muted small">Behavioral</p>
                </div>
                <div class="d-flex align-items-center" style="position: relative;">
                    <button class="btn btn-light border" id="filterToggle" type="button">
                        <i class="fas fa-filter me-2"></i>
                        <span id="filterLabel">ทั้งหมด</span>
                        <i class="fas fa-chevron-down ms-2"></i>
                    </button>
                    <div class="filter-dropdown" id="filterDropdown" style="display: none;">
                        <div class="filter-dropdown-content">
                            <div class="filter-option" data-value="">
                                <span>ทั้งหมด</span>
                            </div>
                            <div class="filter-option" data-value="reviewed">
                                <span>ตรวจสอบแล้ว</span>
                            </div>
                            <div class="filter-option" data-value="pending">
                                <span>รอตรวจสอบ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table behavioral-table">
                    <thead>
                        <tr>
                            <th style="width: 15%;">Date</th>
                            <th style="width: 65%;">Messages</th>
                            <th style="width: 20%;">Status</th>
                        </tr>
                    </thead>
                    <tbody id="reportsTableBody">
                        @forelse($data['reports'] as $report)
                        <tr class="report-row" data-id="{{ $report['id'] }}" style="cursor: pointer;">
                            <td class="text-center">{{ $report['date'] }}</td>
                            <td class="text-center">{{ Str::limit($report['message'], 100, '.....') }}</td>
                            <td class="text-center">
                                @if($report['status'] == 'reviewed')
                                    <span style="color: #006E0B; font-weight: 500;">ตรวจสอบแล้ว</span>
                                @else
                                    <span style="color: #D36300; font-weight: 500;">รอตรวจสอบ</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-2x mb-2"></i><br>
                                ไม่พบข้อมูลที่ตรงกับเงื่อนไขการกรอง
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Google-style Pagination (Right Aligned) - Fixed Version -->
            @if($data['pagination']['total_pages'] > 1)
            <div class="d-flex justify-content-end mt-1">
                <div class="pagination-wrapper">
                    <nav aria-label="Page navigation">
                        <ul class="pagination google-pagination" id="pagination">
                            {{-- Previous Arrow - disabled เฉพาะเมื่ออยู่หน้า 1 --}}
                            <li class="page-item {{ $data['pagination']['current_page'] == 1 ? 'disabled' : '' }}">
                                <a class="page-link page-arrow" href="#" data-page="{{ max(1, $data['pagination']['current_page'] - 1) }}"
                                   {{ $data['pagination']['current_page'] == 1 ? 'tabindex="-1" aria-disabled="true"' : '' }}>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            
                            @php
                                $current = $data['pagination']['current_page'];
                                $total = $data['pagination']['total_pages'];
                                $start = max(1, $current - 4);
                                $end = min($total, $current + 4);
                                
                                // Show more pages if we're near the beginning or end
                                if ($current <= 5) {
                                    $end = min($total, 10);
                                } elseif ($current > $total - 5) {
                                    $start = max(1, $total - 9);
                                }
                            @endphp
                            
                            @if($start > 1)
                                <li class="page-item">
                                    <a class="page-link" href="#" data-page="1">1</a>
                                </li>
                                @if($start > 2)
                                    <li class="page-item disabled">
                                        <span class="page-link dots">...</span>
                                    </li>
                                @endif
                            @endif
                            
                            @for($i = $start; $i <= $end; $i++)
                                <li class="page-item {{ $i == $current ? 'active' : '' }}">
                                    <a class="page-link" href="#" data-page="{{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor
                            
                            @if($end < $total)
                                @if($end < $total - 1)
                                    <li class="page-item disabled">
                                        <span class="page-link dots">...</span>
                                    </li>
                                @endif
                                <li class="page-item">
                                    <a class="page-link" href="#" data-page="{{ $total }}">{{ $total }}</a>
                                </li>
                            @endif
                            
                            {{-- Next Arrow - disabled เฉพาะเมื่ออยู่หน้าสุดท้าย --}}
                            <li class="page-item {{ $data['pagination']['current_page'] == $data['pagination']['total_pages'] ? 'disabled' : '' }}">
                                <a class="page-link page-arrow" href="#" data-page="{{ min($data['pagination']['total_pages'], $data['pagination']['current_page'] + 1) }}"
                                   {{ $data['pagination']['current_page'] == $data['pagination']['total_pages'] ? 'tabindex="-1" aria-disabled="true"' : '' }}>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Updated Report Detail Modal -->
<div class="modal fade" id="reportDetailModal" tabindex="-1" aria-labelledby="reportDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header border-0 pb-0">
                <div class="w-100 d-flex justify-content-end align-items-start">
                    <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times" style="color: #343A81; font-size: 25px; margin-right: 5px"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body" style="padding: 0px 30px 30px;">
                <div class="row">
                    <!-- Left side - Image -->
                    <div class="col-md-6">
                        <div class="image-gallery">
                            <div class="image-container" style="position: relative; height: 400px; background: #f8f9fa; border-radius: 15px; overflow: hidden;">
                                <img id="currentImage" src="" alt="Report Image" style="width: 100%; height: 100%; object-fit: cover; display: none;">
                                <div id="noImageMessage" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #666; font-size: 18px; font-weight: 500; display: none;">
                                    <i class="fas fa-image fa-3x mb-3" style="color: #ddd;"></i><br>
                                    ไม่พบรูปภาพ
                                </div>
                                <div class="image-nav-left" style="position: absolute; left: 0; top: 0; width: 50%; height: 100%; cursor: pointer; z-index: 10;"></div>
                                <div class="image-nav-right" style="position: absolute; right: 0; top: 0; width: 50%; height: 100%; cursor: pointer; z-index: 10;"></div>
                                
                                <!-- Image indicators -->
                                <div class="image-indicators" id="imageIndicators" style="position: absolute; bottom: 15px; left: 50%; transform: translateX(-50%); display: flex; gap: 8px; padding: 8px 12px; background: rgba(0,0,0,0.3); border-radius: 20px;">
                                    <span class="indicator active" data-index="0"></span>
                                    <span class="indicator" data-index="1"></span>
                                    <span class="indicator" data-index="2"></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Audio and Location Controls - Vertical Layout -->
                        <div class="controls-section mt-3 d-flex justify-content-space-between align-items-center" style="padding: 0 50px;">
                            <!-- Audio Control -->
                            <div class="audio-control d-flex flex-column align-items-center" style="cursor: pointer;" onclick="toggleAudio()">
                                <div class="audio-icon mb-2">
                                    <i id="audioIcon" class="fas fa-play" style="color: #626DF7; font-size: 24px;"></i>
                                </div>
                                <span id="audioTime" style="color: #343A81; font-size: 14px; font-weight: 400;">เสียงรายงาน</span>
                            </div>
                            
                            <!-- Location Control -->
                            <div class="location-control d-flex flex-column align-items-center" style="cursor: pointer;" onclick="openLocation()">
                                <div class="location-icon mb-2">
                                    <i class="fas fa-map-marker-alt" style="color: #626DF7; font-size: 24px;"></i>
                                </div>
                                <span style="color: #343A81; font-size: 16px; font-weight: 600; ">ตำแหน่งที่ตั้ง</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right side - Content -->
                    <div class="col-md-6" style="position: relative;">
                        <!-- Message Content without background and title -->
                        <div class="content-section" style="height: 500px; display: flex; flex-direction: column; justify-content: space-between; margin-right: 30px;">
                            <!-- Message text without background -->
                            <div class="message-content" style="flex-grow: 1; overflow-y: auto; padding: 20px; ">
                                <p id="reportMessage" style="color: #343A81; font-size: 16px; margin: 0;"></p>
                            </div>
                            
                            <!-- Review Button - Bottom Right -->
                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-primary" id="reviewBtn" style="background-color: #626DF7; border-color: #626DF7; border-radius: 10px; padding: 10px 30px; font-weight: 500; font-size: 14px;">ตรวจสอบ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal with Gray Background -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <h6 class="mb-3" style="font-weight: 600; color: #2d3748;">ยืนยันการตรวจสอบ</h6>
                    <p class="text-muted mb-0" style="font-size: 14px;">คุณต้องการยืนยันการตรวจสอบหรือไม่?</p>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal" style="border-radius: 10px; font-weight: 500;">ยกเลิก</button>
                    <button type="button" class="btn btn-primary px-4" id="confirmReviewBtn" style="border-radius: 10px; background: #626DF7; border-color: #626DF7; font-weight: 500;">ตกลง</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.col-md-2_4 {
    flex: 0 0 20%;
    max-width: 20%;
}

@media (max-width: 768px) {
    .col-md-2_4 {
        flex: 0 0 50%;
        max-width: 50%;
        margin-bottom: 15px;
    }
}

/* Confirmation Modal with Gray Background */
#confirmationModal .modal-backdrop {
    background-color: rgba(128, 128, 128, 0.8) !important; /* Gray background */
}

/* Ensure confirmation modal appears above other modals */
#confirmationModal {
    z-index: 1060;
}

#confirmationModal .modal-backdrop {
    z-index: 1055;
}

/* Add gray overlay when confirmation modal is shown */
.modal-gray-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(128, 128, 128, 0.8);
    z-index: 1055;
    backdrop-filter: blur(2px);
}

/* Table Center Alignment */
.behavioral-table th,
.behavioral-table td {
    text-align: center !important;
    vertical-align: middle !important;
}

/* Google-style Pagination - Right Aligned */
.pagination-wrapper {
    display: inline-flex;
    align-items: center;
    font-family: 'Kanit', sans-serif;
}

.google-pagination {
    margin: 0;
    display: flex;
    align-items: center;
    gap: 2px;
}

.google-pagination .page-item {
    margin: 0;
}

.google-pagination .page-link {
    color: #453d9c;
    border: none;
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 400;
    background-color: transparent;
    transition: all 0.2s ease-in-out;
    min-width: 34px;
    min-height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
}

.google-pagination .page-item.active .page-link {
    background-color: #626DF7;
    color: white;
    font-weight: 500;
    border-radius: 4px;
    pointer-events: none;
}

.google-pagination .page-item.active .page-link:hover {
    background-color: #626DF7 !important;
    transform: none !important;
}

/* Disabled state สำหรับปุ่ม Previous/Next */
.google-pagination .page-item.disabled .page-link {
    color: #d0d0d0 !important;
    background-color: #f8f9fa !important;
    cursor: not-allowed !important;
    opacity: 0.5 !important;
    pointer-events: none;
}

.google-pagination .page-item.disabled .page-link:hover {
    color: #d0d0d0 !important;
    background-color: #f8f9fa !important;
    transform: none !important;
    box-shadow: none !important;
}

.google-pagination .page-item.disabled .page-link.dots {
    opacity: 0.4 !important;
}

.google-pagination .page-item.disabled .page-arrow {
    color: #d0d0d0 !important;
    background-color: #f8f9fa !important;
    border: 1px solid #e9ecef !important;
}

.google-pagination .page-item.disabled .page-arrow i {
    opacity: 0.3 !important;
}

/* เมื่อไม่ได้เป็น disabled ให้มี hover effect ปกติ */
.google-pagination .page-item:not(.disabled) .page-arrow:hover {
    background-color: #f8f9fa !important;
    color: #202124 !important;
    border-radius: 4px !important;
    transform: scale(1.05);
}

.google-pagination .page-item:not(.disabled) .page-link:hover {
    background-color: #f0f0f0 !important;
    color: #333 !important;
    transform: translateY(-1px);
}

/* Arrow buttons */
.google-pagination .page-arrow {
    color: #70757a !important;
    font-size: 11px;
    padding: 6px 8px !important;
    min-width: 32px !important;
    min-height: 32px !important;
}

/* Dots styling */
.google-pagination .dots {
    color: #70757a !important;
    cursor: default;
    padding: 6px 4px !important;
}

/* สำหรับ focus state */
.google-pagination .page-item:not(.disabled) .page-link:focus {
    outline: 2px solid #626DF7;
    outline-offset: 2px;
    box-shadow: 0 0 0 0.2rem rgba(98, 109, 247, 0.25);
}

.google-pagination .page-item.disabled .page-link:focus {
    outline: none !important;
    box-shadow: none !important;
}

/* Modal improvements */
.modal-dialog-centered {
    display: flex;
    align-items: center;
    min-height: calc(100% - 60px);
}

.modal-lg {
    max-width: 900px;
}

.modal-content {
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

/* Image container improvements */
.image-container {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.image-container:hover {
    transform: translateY(-2px);
}

.image-indicators {
    backdrop-filter: blur(8px);
}

.indicator {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.3s ease;
}

.indicator.active {
    background-color: white;
    transform: scale(1.3);
}

/* Audio and Location Controls */
.controls-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.audio-control,
.location-control {
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 10px;
    border-radius: 10px;
}

.audio-control:hover,
.location-control:hover {
    background-color: rgba(98, 109, 247, 0.1);
    transform: translateY(-2px);
}

.audio-control:active,
.location-control:active {
    transform: translateY(0);
}

.audio-icon,
.location-icon {
    width: 48px;
    height: 48px;
    background: rgba(98, 109, 247, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.audio-control:hover .audio-icon,
.location-control:hover .location-icon {
    background: rgba(98, 109, 247, 0.2);
    transform: scale(1.05);
}

/* Playing animation */
.audio-icon.playing {
    background: rgba(98, 109, 247, 0.2);
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(98, 109, 247, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(98, 109, 247, 0); }
    100% { box-shadow: 0 0 0 0 rgba(98, 109, 247, 0); }
}

/* Message title styling */
.message-title h6 {
    margin: 0;
    padding-right: 10px;
}

/* Content section improvements */
.content-section {
    position: relative;
}

.flex-grow-1 {
    flex-grow: 1;
}

#reviewBtn {
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(98, 109, 247, 0.3);
}

#reviewBtn:hover:not(:disabled) {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(98, 109, 247, 0.4);
}

#reviewBtn:disabled {
    box-shadow: none;
    transform: none;
}

/* Custom Close Button */
.btn-close-custom {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-close-custom:hover {
    transform: scale(1.1);
}

.btn-close-custom:focus {
    outline: none;
    box-shadow: none;
}

/* Behavioral Table Styles */
.behavioral-table {
    border-collapse: collapse;
    border: 2px solid #ddd;
}

.behavioral-table th {
    font-weight: 600;
    color: #2d3748;
    border: 1px solid #ddd;
    padding: 12px;
    background-color: #f8f9fa;
}

.behavioral-table td {
    border: 1px solid #ddd;
    padding: 12px;
    vertical-align: middle;
}

.behavioral-table tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.behavioral-table tbody tr:nth-child(even) {
    background-color: white;
}

.report-row:hover {
    background-color: #f0f0f0 !important;
}

.image-container img {
    transition: transform 0.3s ease;
}

.image-nav-left:hover,
.image-nav-right:hover {
    background: linear-gradient(to right, rgba(0,0,0,0.1), transparent);
}

.image-nav-right:hover {
    background: linear-gradient(to left, rgba(0,0,0,0.1), transparent);
}

.message-content {
    font-size: 24px;
}

.message-content::-webkit-scrollbar {
    width: 4px;
}

.message-content::-webkit-scrollbar-track {
    background: #e9ecef;
    border-radius: 2px;
}

.message-content::-webkit-scrollbar-thumb {
    background: #626DF7;
    border-radius: 2px;
}

.message-content::-webkit-scrollbar-thumb:hover {
    background: #4A5FE7;
}

.table th {
    font-weight: 600;
    color: #2d3748;
    border-bottom: 2px solid #e2e8f0;
}

.table td {
    vertical-align: middle;
    border-bottom: 1px solid #e2e8f0;
}

/* Filter Toggle Button Styles */
#filterToggle {
    background: white;
    border: 2px solid #ddd;
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 14px;
    font-weight: 500;
    color: #2d3748;
    transition: all 0.2s ease;
    min-width: 120px;
    position: relative;
}

#filterToggle:hover {
    border-color: #999;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

#filterToggle:focus {
    border-color: #626DF7;
    box-shadow: 0 0 0 0.2rem rgba(98, 109, 247, 0.25);
}

.filter-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1050;
    min-width: 160px;
    margin-top: 8px;
}

.filter-dropdown-content {
    background: white;
    border: 2px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    animation: fadeInUp 0.2s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.filter-option {
    padding: 12px 16px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 14px;
    font-weight: 500;
    color: #2d3748;
    border-bottom: 1px solid #f0f0f0;
}

.filter-option:last-child {
    border-bottom: none;
}

.filter-option:hover {
    background-color: #f8f9ff;
    color: #626DF7;
}

.filter-option.active {
    background-color: #626DF7;
    color: white;
}

.filter-option.active:hover {
    background-color: #5a66e8;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .modal-lg {
        max-width: 95%;
        margin: 10px auto;
    }
    
    .image-container {
        height: 250px !important;
    }
    
    .modal-body .row {
        flex-direction: column;
    }
    
    .modal-body .col-md-6 {
        max-width: 100%;
        margin-bottom: 20px;
    }
    
    .controls-section {
        justify-content: center !important;
        gap: 20px;
    }
}

/* Animation improvements */
@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(-50px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.modal.show .modal-dialog {
    animation: modalFadeIn 0.3s ease-out;
}

/* Audio time styling */
#audioTime {
    font-family: 'Kanit', monospace;
    letter-spacing: 0.5px;
}

/* Modal backdrop improvements */
.modal-backdrop {
    backdrop-filter: blur(3px);
    background-color: rgba(0, 0, 0, 0.6);
}

/* Empty state styling */
.table tbody tr td i.fa-inbox {
    color: #dee2e6;
}
</style>
@endsection

@section('scripts')
<script>
let currentImageIndex = 0;
let currentImages = [];
let currentReportId = null;
let currentReportStatus = null;
let currentReportLatitude = null;
let currentReportLongitude = null;
let currentAudioUrl = null;

// Schools chart
const schoolsCtx = document.getElementById('schoolsChart').getContext('2d');
const schoolsData = {!! json_encode($data['schools_data']) !!};
const labels = Object.keys(schoolsData);
const values = Object.values(schoolsData);

const backgroundColors = ['#4252B8', '#FA5A7E', '#FF957A', '#3CD956', '#BF83FF'];

new Chart(schoolsCtx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            data: values,
            backgroundColor: backgroundColors,
            borderRadius: 8,
            borderSkipped: false,
            barThickness: 60
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 20,
                right: 20,
                top: 20,
                bottom: 20
            }
        },
        interaction: {
            intersect: false,
            mode: 'index'
        },
        scales: {
            y: { 
                beginAtZero: true,
                max: Math.max(...values) > 0 ? Math.ceil(Math.max(...values) * 1.2) : 10,
                grid: {
                    display: true,
                    color: '#f0f0f0',
                    lineWidth: 1
                },
                ticks: {
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#666666',
                    stepSize: Math.max(1, Math.ceil(Math.max(...values) / 5))
                },
                border: {
                    display: false
                }
            },
            x: {
                grid: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    font: {
                        size: 12,
                        weight: '500'
                    },
                    color: '#666666',
                    maxRotation: 0
                },
                border: {
                    display: false
                }
            }
        },
        plugins: {
            legend: { 
                display: false 
            },
            tooltip: {
                enabled: true,
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: 'white',
                bodyColor: 'white',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false,
                padding: 12,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 12
                },
                callbacks: {
                    title: function(context) {
                        return context[0].label;
                    },
                    label: function(context) {
                        const value = context.parsed.y;
                        return `จำนวน: ${value}`;
                    }
                },
                position: 'average',
                caretPadding: 10
            }
        },
        animation: {
            duration: 2000,
            easing: 'easeInOutQuart'
        },
        elements: {
            bar: {
                borderRadius: 8
            }
        }
    }
});

// Filter toggle functionality
let currentFilter = '{{ $data["current_filter"] ?? "" }}';
let isFilterOpen = false;

document.getElementById('filterToggle').addEventListener('click', function(e) {
    e.stopPropagation();
    toggleFilterDropdown();
});

// Close dropdown when clicking outside
document.addEventListener('click', function(e) {
    if (isFilterOpen && !e.target.closest('.filter-dropdown') && !e.target.closest('#filterToggle')) {
        closeFilterDropdown();
    }
});

// Filter option selection
document.addEventListener('click', function(e) {
    if (e.target.closest('.filter-option')) {
        const option = e.target.closest('.filter-option');
        const value = option.getAttribute('data-value');
        const text = option.querySelector('span').textContent;
        
        console.log('Filter selected:', value, text);
        
        selectFilterOption(value, text);
        closeFilterDropdown();
        
        // Load reports with new filter and reset to page 1
        loadReports(value, 1);
    }
});

function toggleFilterDropdown() {
    const dropdown = document.getElementById('filterDropdown');
    const button = document.getElementById('filterToggle');
    const chevron = button.querySelector('.fa-chevron-down');
    
    if (isFilterOpen) {
        closeFilterDropdown();
    } else {
        dropdown.style.display = 'block';
        updateFilterOptions();
        chevron.style.transform = 'rotate(180deg)';
        isFilterOpen = true;
    }
}

function closeFilterDropdown() {
    const dropdown = document.getElementById('filterDropdown');
    const chevron = document.getElementById('filterToggle').querySelector('.fa-chevron-down');
    
    dropdown.style.display = 'none';
    chevron.style.transform = 'rotate(0deg)';
    isFilterOpen = false;
}

function selectFilterOption(value, text) {
    currentFilter = value;
    
    const label = document.getElementById('filterLabel');
    label.textContent = text;
    
    updateFilterOptions();
}

function updateFilterOptions() {
    document.querySelectorAll('.filter-option').forEach(option => {
        const value = option.getAttribute('data-value');
        option.classList.toggle('active', value === currentFilter);
    });
}

// Initialize filter state
document.addEventListener('DOMContentLoaded', function() {
    // Debug current filter
    console.log('Initial current filter:', currentFilter);
    
    // Set initial filter based on current data
    if (currentFilter) {
        const activeOption = document.querySelector(`[data-value="${currentFilter}"]`);
        if (activeOption) {
            const text = activeOption.querySelector('span').textContent;
            selectFilterOption(currentFilter, text);
        }
    } else {
        // Default to show all
        document.getElementById('filterLabel').textContent = 'ทั้งหมด';
    }
    updateFilterOptions();
    
    // Check if we have data on page load
    const tableBody = document.getElementById('reportsTableBody');
    const hasData = tableBody.querySelectorAll('tr:not(.empty-state)').length > 0;
    console.log('Has data on page load:', hasData);
    
    // Add modal close event listener to stop audio
    const reportModal = document.getElementById('reportDetailModal');
    if (reportModal) {
        reportModal.addEventListener('hidden.bs.modal', function() {
            stopAudio();
            console.log('Modal closed, audio stopped');
        });
    }
});

// Pagination - Fixed Version
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('page-link') || e.target.closest('.page-link')) {
        e.preventDefault();
        e.stopPropagation();
        
        const pageLink = e.target.classList.contains('page-link') ? e.target : e.target.closest('.page-link');
        const pageItem = pageLink.closest('.page-item');
        
        // ตรวจสอบว่าปุ่มเป็น disabled หรือไม่
        if (pageItem.classList.contains('disabled')) {
            console.log('Page link is disabled, ignoring click');
            return; // ไม่ทำอะไรถ้าปุ่มเป็น disabled
        }
        
        const page = pageLink.getAttribute('data-page');
        if (page && parseInt(page) > 0) {
            console.log('Page clicked:', page, 'Current filter:', currentFilter);
            
            // ป้องกันการ scroll to top
            const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
            
            loadReports(currentFilter, parseInt(page));
            
            // คืนค่า scroll position หลังจาก DOM update
            setTimeout(() => {
                window.scrollTo(0, currentScrollPosition);
            }, 100);
        }
    }
});

// Report row clicks
document.addEventListener('click', function(e) {
    const reportRow = e.target.closest('.report-row');
    if (reportRow) {
        const reportId = reportRow.getAttribute('data-id');
        showReportDetail(reportId);
    }
});

// Image navigation
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('image-nav-left')) {
        navigateImage(-1);
    } else if (e.target.classList.contains('image-nav-right')) {
        navigateImage(1);
    } else if (e.target.classList.contains('indicator')) {
        const index = parseInt(e.target.getAttribute('data-index'));
        showImage(index);
    }
});

// Review button
document.getElementById('reviewBtn').addEventListener('click', function() {
    // เช็คว่าปุ่มถูก disabled หรือไม่
    if (this.disabled || currentReportStatus === 'reviewed') {
        return; // ไม่ทำอะไรถ้าปุ่มถูก disabled
    }
    
    if (currentReportStatus === 'pending') {
        showConfirmationModal();
    }
});

// Confirm review
document.getElementById('confirmReviewBtn').addEventListener('click', function() {
    confirmReview();
});

// Audio and Location functionality
let audioTimer = null;
let currentAudioTime = 0;
let totalAudioTime = 300; // 5:00 minutes in seconds
let isAudioPlaying = false;
let audioElement = null;

function toggleAudio() {
    const audioIcon = document.getElementById('audioIcon');
    const audioTimeEl = document.getElementById('audioTime');
    const audioIconContainer = audioIcon.parentElement;
    const audioControl = audioIconContainer.parentElement;
    
    if (!currentAudioUrl) {
        console.log('No audio URL available - audio control disabled');
        // ไม่มีไฟล์เสียง - ไม่สามารถเล่นได้
        audioControl.style.cursor = 'not-allowed';
        audioControl.style.opacity = '0.5';
        return;
    }
    
    if (!isAudioPlaying) {
        // Start playing
        if (!audioElement) {
            audioElement = new Audio(currentAudioUrl);
            
            audioElement.addEventListener('loadedmetadata', function() {
                totalAudioTime = Math.floor(audioElement.duration) || 300;
                console.log('Audio loaded, duration:', totalAudioTime, 'seconds');
            });
            
            audioElement.addEventListener('timeupdate', function() {
                if (isAudioPlaying) {
                    currentAudioTime = Math.floor(audioElement.currentTime);
                    // ไม่เรียก updateAudioTime() เพราะต้องการให้แสดงคำว่า "Voice" ตลอดเวลา
                }
            });
            
            audioElement.addEventListener('ended', function() {
                console.log('Audio playback ended');
                stopAudio();
                currentAudioTime = 0; // Reset to 0 when finished
                // ไม่เรียก updateAudioTime() เพราะต้องการให้แสดงคำว่า "Voice" ตลอดเวลา
            });
            
            audioElement.addEventListener('error', function(e) {
                console.error('Audio error:', e);
                stopAudio();
                currentAudioTime = 0;
                totalAudioTime = 0;
                // ไม่เรียก updateAudioTime() เพราะต้องการให้แสดงคำว่า "Voice" ตลอดเวลา
            });
        }
        
        audioElement.play().then(() => {
            isAudioPlaying = true;
            audioIcon.className = 'fas fa-pause';
            audioIconContainer.classList.add('playing');
            console.log('Audio started playing');
        }).catch(error => {
            console.error('Audio play failed:', error);
            stopAudio();
        });
    } else {
        // Pause playing
        if (audioElement) {
            audioElement.pause();
        }
        isAudioPlaying = false;
        audioIcon.className = 'fas fa-play';
        audioIconContainer.classList.remove('playing');
        console.log('Audio paused');
    }
}

function stopAudio() {
    const audioIcon = document.getElementById('audioIcon');
    const audioIconContainer = audioIcon.parentElement;
    
    isAudioPlaying = false;
    audioIcon.className = 'fas fa-play';
    audioIconContainer.classList.remove('playing');
    
    if (audioElement) {
        audioElement.pause();
        audioElement.currentTime = 0;
    }
    
    // แสดงคำว่า "Voice" ตลอดเวลา ไม่ต้องอัปเดตเวลา
    console.log('Audio stopped');
}

function updateAudioTime() {
    const audioTimeEl = document.getElementById('audioTime');
    
    // แสดงคำว่า "Voice" แทนเวลา
    audioTimeEl.textContent = 'Voice';
}

function openLocation() {
    if (currentReportLatitude && currentReportLongitude) {
        // Open Google Maps with specific coordinates
        const googleMapsUrl = `https://www.google.com/maps?q=${currentReportLatitude},${currentReportLongitude}&z=15`;
        window.open(googleMapsUrl, '_blank');
        console.log('Opening Google Maps with coordinates:', currentReportLatitude, currentReportLongitude);
    } else {
        // Default location if no coordinates
        const googleMapsUrl = 'https://www.google.com/maps/search/Thailand';
        window.open(googleMapsUrl, '_blank');
        console.log('Opening Google Maps with default location');
    }
}

function loadReports(status = '', page = 1) {
    // Show loading state
    const tbody = document.getElementById('reportsTableBody');
    tbody.innerHTML = '<tr><td colspan="3" class="text-center py-4"><i class="fas fa-spinner fa-spin"></i> กำลังโหลด...</td></tr>';
    
    // Build URL with proper parameters
    const url = new URL(window.location.href.split('?')[0]); // Remove existing query params
    
    // Add page parameter
    if (page && page > 1) {
        url.searchParams.set('page', page);
    }
    
    // Add status parameter
    if (status && status !== '') {
        url.searchParams.set('status', status);
    }
    
    console.log('Loading reports with URL:', url.toString());
    console.log('Status filter:', status);
    console.log('Page:', page);
    
    fetch(url.toString(), {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Received data:', data);
        updateReportsTable(data.reports);
        updatePagination(data.pagination);
        // Update current filter to match response
        currentFilter = data.current_filter || '';
        
        // Update URL without reloading page
        window.history.replaceState({}, '', url.toString());
    })
    .catch(error => {
        console.error('Error loading reports:', error);
        tbody.innerHTML = '<tr><td colspan="3" class="text-center py-4 text-danger"><i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการโหลดข้อมูล</td></tr>';
    });
}

function updateReportsTable(reports) {
    const tbody = document.getElementById('reportsTableBody');
    tbody.innerHTML = '';
    
    console.log('Updating table with reports:', reports);
    console.log('Number of reports:', reports.length);
    
    if (reports.length === 0) {
        tbody.innerHTML = `
            <tr class="empty-state">
                <td colspan="3" class="text-center py-4 text-muted">
                    <i class="fas fa-inbox fa-2x mb-2"></i><br>
                    ไม่พบข้อมูลที่ตรงกับเงื่อนไขการกรอง
                </td>
            </tr>
        `;
        return;
    }
    
    reports.forEach((report, index) => {
        const statusText = report.status === 'reviewed' 
            ? '<span style="color: #006E0B;  font-weight: 500;">ตรวจสอบแล้ว</span>'
            : '<span style="color: #D36300;  font-weight: 500;">รอตรวจสอบ</span>';
            
        const row = `
            <tr class="report-row" data-id="${report.id}" style="cursor: pointer;">
                <td class="text-center">${report.date}</td>
                <td class="text-center">${report.message.length > 100 ? report.message.substring(0, 100) + '.....' : report.message}</td>
                <td class="text-center">${statusText}</td>
            </tr>
        `;
        tbody.innerHTML += row;
        
        console.log(`Report ${index + 1}:`, report.id, report.status, report.date);
    });
}

// Fixed updatePagination function
function updatePagination(pagination) {
    const paginationEl = document.getElementById('pagination');
    if (!paginationEl) return;
    
    const paginationContainer = paginationEl.parentElement.parentElement.parentElement;
    
    // Clear pagination
    paginationEl.innerHTML = '';
    
    // Hide pagination if only one page or no data
    if (pagination.total_pages <= 1 || pagination.total === 0) {
        paginationContainer.style.display = 'none';
        return;
    }
    
    // Show pagination container
    paginationContainer.style.display = 'flex';
    
    const current = parseInt(pagination.current_page);
    const total = parseInt(pagination.total_pages);
    
    console.log('Updating pagination - Current:', current, 'Total:', total);
    
    // Previous arrow - disabled เฉพาะเมื่อหน้าปัจจุบันเป็น 1
    const prevDisabled = current === 1;
    const prevArrowClass = prevDisabled ? 'page-item disabled' : 'page-item';
    const prevArrowAttrs = prevDisabled ? 'tabindex="-1" aria-disabled="true"' : '';
    const prevPage = Math.max(1, current - 1);
    
    paginationEl.innerHTML += `
        <li class="${prevArrowClass}">
            <a class="page-link page-arrow" href="#" data-page="${prevPage}" ${prevArrowAttrs}>
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>
    `;
    
    // Page numbers - show more like Google
    let start = Math.max(1, current - 4);
    let end = Math.min(total, current + 4);
    
    // Show more pages if we're near the beginning or end
    if (current <= 5) {
        end = Math.min(total, 10);
    } else if (current > total - 5) {
        start = Math.max(1, total - 9);
    }
    
    // First page + ellipsis
    if (start > 1) {
        paginationEl.innerHTML += `
            <li class="page-item">
                <a class="page-link" href="#" data-page="1">1</a>
            </li>
        `;
        if (start > 2) {
            paginationEl.innerHTML += `
                <li class="page-item disabled">
                    <span class="page-link dots">...</span>
                </li>
            `;
        }
    }
    
    // Page numbers
    for (let i = start; i <= end; i++) {
        const activeClass = i == current ? 'active' : '';
        paginationEl.innerHTML += `
            <li class="page-item ${activeClass}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>
        `;
    }
    
    // Ellipsis + last page
    if (end < total) {
        if (end < total - 1) {
            paginationEl.innerHTML += `
                <li class="page-item disabled">
                    <span class="page-link dots">...</span>
                </li>
            `;
        }
        paginationEl.innerHTML += `
            <li class="page-item">
                <a class="page-link" href="#" data-page="${total}">${total}</a>
            </li>
        `;
    }
    
    // Next arrow - disabled เฉพาะเมื่อหน้าปัจจุบันเป็นหน้าสุดท้าย
    const nextDisabled = current === total;
    const nextArrowClass = nextDisabled ? 'page-item disabled' : 'page-item';
    const nextArrowAttrs = nextDisabled ? 'tabindex="-1" aria-disabled="true"' : '';
    const nextPage = Math.min(total, current + 1);
    
    paginationEl.innerHTML += `
        <li class="${nextArrowClass}">
            <a class="page-link page-arrow" href="#" data-page="${nextPage}" ${nextArrowAttrs}>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    `;
}

function showReportDetail(reportId) {
    // Fetch report detail from API
    fetch(`/api/behavioral-report/detail/${reportId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                throw new Error(data.error);
            }
            
            // Set current report data
            currentReportId = reportId;
            currentReportStatus = data.status;
            currentReportLatitude = data.latitude;
            currentReportLongitude = data.longitude;
            currentAudioUrl = data.audio;
            currentImages = data.images || []; // Ensure it's an array
            currentImageIndex = 0;
            
            console.log('Report detail loaded:', {
                id: reportId,
                imagesCount: currentImages.length,
                hasAudio: !!currentAudioUrl,
                images: currentImages
            });
            
            // Update modal content with actual data from API
            document.getElementById('reportMessage').textContent = data.message;
            showImage(0);
            updateReviewButton();
            
            // Initialize audio time
            initializeAudio();
            
            // Update audio controls after setting currentAudioUrl
            updateAudioControls();
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('reportDetailModal'));
            modal.show();
        })
        .catch(error => {
            console.error('Error loading report detail:', error);
            alert('ไม่สามารถโหลดรายละเอียดรายงานได้');
        });
}

function initializeAudio() {
    // Reset audio state
    stopAudio();
    currentAudioTime = 0;
    totalAudioTime = 0;
    audioElement = null;
    updateAudioTime(); // แสดงคำว่า "Voice"
    
    // Update audio controls based on whether audio exists
    updateAudioControls();
    
    console.log('Audio initialized');
}

function updateAudioControls() {
    const audioIcon = document.getElementById('audioIcon');
    const audioIconContainer = audioIcon.parentElement;
    const audioControl = audioIconContainer.parentElement;
    
    if (!currentAudioUrl) {
        // ไม่มีไฟล์เสียง - disable control
        audioControl.style.cursor = 'not-allowed';
        audioControl.style.opacity = '0.5';
        audioIcon.className = 'fas fa-play';
        audioIconContainer.classList.remove('playing');
        console.log('Audio control disabled - no audio file');
    } else {
        // มีไฟล์เสียง - enable control
        audioControl.style.cursor = 'pointer';
        audioControl.style.opacity = '1';
        audioIcon.className = 'fas fa-play';
        audioIconContainer.classList.remove('playing');
        console.log('Audio control enabled - audio file available');
    }
}

function showImage(index) {
    const imageEl = document.getElementById('currentImage');
    const noImageEl = document.getElementById('noImageMessage');
    const indicatorsEl = document.getElementById('imageIndicators');
    
    if (currentImages.length === 0) {
        // No images available - show no image message
        imageEl.style.display = 'none';
        noImageEl.style.display = 'block';
        indicatorsEl.style.display = 'none';
        return;
    }
    
    // Has images - show image
    imageEl.style.display = 'block';
    noImageEl.style.display = 'none';
    indicatorsEl.style.display = 'flex';
    
    currentImageIndex = index;
    imageEl.src = currentImages[index];
    
    // Update indicators
    document.querySelectorAll('.indicator').forEach((indicator, i) => {
        indicator.classList.toggle('active', i === index);
        // Show only the indicators for available images
        indicator.style.display = i < currentImages.length ? 'block' : 'none';
    });
}

function navigateImage(direction) {
    if (currentImages.length === 0) return;
    
    const newIndex = currentImageIndex + direction;
    if (newIndex >= 0 && newIndex < currentImages.length) {
        showImage(newIndex);
    } else if (newIndex < 0) {
        showImage(currentImages.length - 1);
    } else {
        showImage(0);
    }
}

function updateReviewButton() {
    const reviewBtn = document.getElementById('reviewBtn');
    
    if (currentReportStatus === 'reviewed') {
        // สถานะตรวจสอบแล้ว - ปุ่มสีจางและไม่สามารถกดได้
        reviewBtn.style.backgroundColor = '#B8B8B8';
        reviewBtn.style.borderColor = '#B8B8B8';
        reviewBtn.style.color = '#FFFFFF';
        reviewBtn.style.opacity = '0.6';
        reviewBtn.style.cursor = 'not-allowed';
        reviewBtn.disabled = true;
        reviewBtn.textContent = 'ตรวจสอบแล้ว';
    } else {
        // สถานะรอตรวจสอบ - ปุ่มปกติ
        reviewBtn.style.backgroundColor = '#626DF7';
        reviewBtn.style.borderColor = '#626DF7';
        reviewBtn.style.color = '#FFFFFF';
        reviewBtn.style.opacity = '1';
        reviewBtn.style.cursor = 'pointer';
        reviewBtn.disabled = false;
        reviewBtn.textContent = 'ตรวจสอบ';
    }
}

function showConfirmationModal() {
    // Add gray overlay
    const overlay = document.createElement('div');
    overlay.className = 'modal-gray-overlay';
    overlay.id = 'grayOverlay';
    document.body.appendChild(overlay);
    
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmationModal'), {
        backdrop: 'static'
    });
    confirmModal.show();
    
    // Remove overlay when modal is hidden
    document.getElementById('confirmationModal').addEventListener('hidden.bs.modal', function() {
        const existingOverlay = document.getElementById('grayOverlay');
        if (existingOverlay) {
            existingOverlay.remove();
        }
    }, { once: true });
}

function confirmReview() {
    fetch(`/api/behavioral-report/update-status/${currentReportId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ status: 'reviewed' })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update current status
            currentReportStatus = 'reviewed';
            
            // Close modals
            bootstrap.Modal.getInstance(document.getElementById('confirmationModal')).hide();
            bootstrap.Modal.getInstance(document.getElementById('reportDetailModal')).hide();
            
            // Remove gray overlay
            const existingOverlay = document.getElementById('grayOverlay');
            if (existingOverlay) {
                existingOverlay.remove();
            }
            
            // Reload reports table
            const currentPage = document.querySelector('.pagination .page-item.active .page-link')?.getAttribute('data-page') || 1;
            loadReports(currentFilter, currentPage);
        } else {
            alert('เกิดข้อผิดพลาดในการอัปเดตสถานะ');
        }
    })
    .catch(error => {
        console.error('Error updating report status:', error);
        alert('เกิดข้อผิดพลาดในการอัปเดตสถานะ');
    });
}
</script>
@endsection