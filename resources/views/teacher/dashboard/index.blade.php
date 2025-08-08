{{-- resources/views/teacher/dashboard/index.blade.php --}}
@extends('layouts.teacher-dashboard')

@section('title', 'Teacher Dashboard - Youth Cybersafe')
@section('page-title', 'Dashboard')

@section('content')
<!-- Top Section: Overview Summary (40%) and Student List Report (60%) -->
<div class="row mb-4">
    <!-- Behavioral Report Overview Summary (40%) -->
    <div class="col-md-5">
        <div class="chart-container dashboard-equal-height">
            <h6><strong>Behavioral Report</strong></h6>
            <p class="text-muted small">Overview Summary</p>
            <div class="dashboard-content-wrapper">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="stat-card stat-card-pink h-100 d-flex flex-column justify-content-center">
                            <div class="stat-icon stat-icon-pink">
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="stat-number">{{ $data['overview']['โรงเรียนวาวีวิทยาคม'] }}</div>
                            <div class="stat-label">วารีวิทยาคม</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List Report Student (60%) -->
    <div class="col-md-7">
        <div class="chart-container dashboard-equal-height">
            <h6><strong>List Report</strong></h6>
            <p class="text-muted small">Student</p>
            
            <div class="dashboard-content-wrapper">
                <div class="table-responsive dashboard-table-container">
                    <table class="table student-reports-table">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Date</th>
                                <th style="width: 80%;">Messages</th>
                            </tr>
                        </thead>
                        <tbody id="studentReportsTableBody">
                            @php
                                $paginatedReports = collect($data['student_reports'])->forPage($data['current_page'] ?? 1, 6);
                            @endphp
                            @forelse($paginatedReports as $report)
                            <tr>
                                <td>{{ $report['date'] }}</td>
                                <td>{{ Str::limit($report['message'], 60, '.....') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center py-4 text-muted">
                                    ไม่พบข้อมูลรายงาน
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination for Student Reports -->
                @php
                    $totalReports = count($data['student_reports']);
                    $perPage = 6;
                    $totalPages = ceil($totalReports / $perPage);
                    $currentPage = $data['current_page'] ?? 1;
                @endphp
                @if($totalPages > 1)
                <div class="dashboard-pagination-wrapper mt-2">
                    <nav aria-label="Student reports pagination">
                        <ul class="pagination dashboard-pagination" id="studentReportsPagination">
                            {{-- Previous --}}
                            <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                <a class="page-link page-arrow" href="#" data-page="{{ max(1, $currentPage - 1) }}" onclick="loadStudentReports({{ max(1, $currentPage - 1) }}); return false;">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            
                            {{-- Page Numbers --}}
                            @for($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="#" data-page="{{ $i }}" onclick="loadStudentReports({{ $i }}); return false;">{{ $i }}</a>
                                </li>
                            @endfor
                            
                            {{-- Next --}}
                            <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                <a class="page-link page-arrow" href="#" data-page="{{ min($totalPages, $currentPage + 1) }}" onclick="loadStudentReports({{ min($totalPages, $currentPage + 1) }}); return false;">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- School Report Chart -->
<div class="row">
    <div class="col-12">
        <div class="chart-container">
            <h6><strong>{{ $data['school_name'] }}</strong></h6>
            <p class="text-muted small">Report</p>
            <div style="height: 450px; position: relative;">
                <canvas id="schoolReportChart"></canvas>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <div><i class="fas fa-circle" style="color: #4C6FFF;"></i> <small>{{ $data['school_name'] }}</small></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Dashboard Equal Height Styling */
.dashboard-equal-height {
    height: 400px !important;
    display: flex;
    flex-direction: column;
}

.dashboard-content-wrapper {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.dashboard-table-container {
    flex: 1;
    overflow-y: auto;
    max-height: 300px;
}

.dashboard-table-container::-webkit-scrollbar {
    width: 4px;
}

.dashboard-table-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 2px;
}

.dashboard-table-container::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 2px;
}

.dashboard-table-container::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Dashboard Pagination Styling */


.dashboard-pagination {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2px;
    font-size: 12px;
}

.dashboard-pagination .page-item {
    margin: 0;
}

.dashboard-pagination .page-link {
    color: #626DF7;
    border: none;
    padding: 4px 8px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 400;
    background-color: transparent;
    transition: all 0.2s ease-in-out;
    min-width: 24px;
    min-height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
}

.dashboard-pagination .page-item.active .page-link {
    background-color: #626DF7;
    color: white;
    font-weight: 500;
}

.dashboard-pagination .page-item.disabled .page-link {
    color: #d0d0d0;
    cursor: not-allowed;
    opacity: 0.5;
}

.dashboard-pagination .page-item:not(.disabled) .page-link:hover {
    background-color: #f0f0f0;
    color: #333;
}

.dashboard-pagination .page-arrow {
    color: #70757a;
    font-size: 10px;
    padding: 4px 6px;
    min-width: 22px;
    min-height: 22px;
}

/* Table styling adjustments for dashboard */
.student-reports-table {
    font-size: 13px;
    margin-bottom: 0;
}

.student-reports-table th,
.student-reports-table td {
    padding: 8px 12px;
    vertical-align: middle;
}

.student-reports-table th {
    background-color: #f8f9fa;
    border-top: none;
    font-size: 12px;
    font-weight: 600;
    color: #2d3748;
}

.student-reports-table td {
    font-size: 12px;
    line-height: 1.4;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .dashboard-equal-height {
        height: auto !important;
        min-height: 300px;
    }
    
    .dashboard-table-container {
        max-height: 200px;
    }
    
    .student-reports-table th,
    .student-reports-table td {
        padding: 6px 8px;
        font-size: 11px;
    }
}

/* Loading state */
.dashboard-loading {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100px;
    color: #6c757d;
}

.dashboard-loading i {
    margin-right: 8px;
}
</style>
@endsection

@section('scripts')
<script>
let schoolReportChart;
let studentReportsData = {!! json_encode($data['student_reports']) !!};
let currentStudentPage = {{ $data['current_page'] ?? 1 }};

const monthLabels = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
const schoolReportData = {!! json_encode($data['school_report_data']) !!};

function initializeChart() {
    const schoolReportCtx = document.getElementById('schoolReportChart').getContext('2d');
    
    const maxValue = Math.max(...schoolReportData);
    const dynamicMax = Math.max(5, Math.ceil(maxValue * 1.2));
    
    schoolReportChart = new Chart(schoolReportCtx, {
        type: 'line',
        data: {
            labels: monthLabels,
            datasets: [
                {
                    label: '{{ $data["school_name"] }}',
                    data: schoolReportData,
                    borderColor: '#4C6FFF',
                    backgroundColor: 'rgba(76, 111, 255, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: '#4C6FFF',
                    pointBorderColor: '#4C6FFF',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: '#4C6FFF',
                    pointHoverBorderColor: '#ffffff',
                    pointHoverBorderWidth: 2
                }
            ]
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
                    max: dynamicMax,
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
                        stepSize: Math.max(1, Math.ceil(dynamicMax / 10)),
                        callback: function(value) {
                            return Number.isInteger(value) ? value : '';
                        }
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
                        color: '#666666'
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
                    displayColors: true,
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
                            return `${context[0].label} 2025`;
                        },
                        label: function(context) {
                            const value = context.parsed.y;
                            return `{{ $data["school_name"] }}: ${value}`;
                        }
                    },
                    position: 'average',
                    caretPadding: 10
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            },
            elements: {
                point: {
                    hoverBorderWidth: 3
                }
            }
        }
    });
}

// Function to load student reports with pagination (updated to 6 items per page)
function loadStudentReports(page) {
    currentStudentPage = page;
    
    // Show loading state
    const tbody = document.getElementById('studentReportsTableBody');
    tbody.innerHTML = '<tr><td colspan="2" class="dashboard-loading"><i class="fas fa-spinner fa-spin"></i> กำลังโหลด...</td></tr>';
    
    // Simulate API call (replace with actual API call if needed)
    setTimeout(() => {
        updateStudentReportsTable(page);
        updateStudentReportsPagination(page);
    }, 300);
}

function updateStudentReportsTable(page) {
    const tbody = document.getElementById('studentReportsTableBody');
    const perPage = 6; // Updated from 4 to 6
    const startIndex = (page - 1) * perPage;
    const endIndex = startIndex + perPage;
    const paginatedData = studentReportsData.slice(startIndex, endIndex);
    
    tbody.innerHTML = '';
    
    if (paginatedData.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="2" class="text-center py-4 text-muted">
                    ไม่พบข้อมูลรายงาน
                </td>
            </tr>
        `;
        return;
    }
    
    paginatedData.forEach(report => {
        const row = `
            <tr>
                <td>${report.date}</td>
                <td>${report.message.length > 60 ? report.message.substring(0, 60) + '.....' : report.message}</td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

function updateStudentReportsPagination(currentPage) {
    const totalReports = studentReportsData.length;
    const perPage = 6; // Updated from 4 to 6
    const totalPages = Math.ceil(totalReports / perPage);
    
    if (totalPages <= 1) {
        return;
    }
    
    const pagination = document.getElementById('studentReportsPagination');
    pagination.innerHTML = '';
    
    // Previous button
    const prevDisabled = currentPage === 1;
    const prevClass = prevDisabled ? 'page-item disabled' : 'page-item';
    pagination.innerHTML += `
        <li class="${prevClass}">
            <a class="page-link page-arrow" href="#" onclick="loadStudentReports(${Math.max(1, currentPage - 1)}); return false;">
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>
    `;
    
    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
        const activeClass = i === currentPage ? 'active' : '';
        pagination.innerHTML += `
            <li class="page-item ${activeClass}">
                <a class="page-link" href="#" onclick="loadStudentReports(${i}); return false;">${i}</a>
            </li>
        `;
    }
    
    // Next button
    const nextDisabled = currentPage === totalPages;
    const nextClass = nextDisabled ? 'page-item disabled' : 'page-item';
    pagination.innerHTML += `
        <li class="${nextClass}">
            <a class="page-link page-arrow" href="#" onclick="loadStudentReports(${Math.min(totalPages, currentPage + 1)}); return false;">
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    `;
}

document.addEventListener('DOMContentLoaded', function() {
    initializeChart();
    
    // Initialize student reports pagination if needed
    const totalReports = studentReportsData.length;
    const totalPages = Math.ceil(totalReports / 6); // Updated from 4 to 6
    if (totalPages > 1) {
        updateStudentReportsPagination(currentStudentPage);
    }
    
    console.log('Teacher dashboard initialized');
});

window.addEventListener('resize', function() {
    if (schoolReportChart) {
        schoolReportChart.resize();
    }
});
</script>
@endsection