@extends('layouts.admin')

@section('title', 'จัดการ Infographics')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">จัดการ Infographics</h1>
        <a href="{{ route('admin.infographics.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> เพิ่ม Infographic ใหม่
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($infographics->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>รูปภาพ</th>
                            <th>หัวข้อ</th>
                            <th>หมวดหมู่</th>
                            <th>ลำดับ</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($infographics as $infographic)
                        <tr>
                            <td>{{ $infographic->id }}</td>
                            <td>
                                @if($infographic->image)
                                <img src="{{ asset($infographic->image) }}" alt="{{ $infographic->title }}" class="img-thumbnail" width="80">
                                @else
                                <span class="text-muted">ไม่มีรูปภาพ</span>
                                @endif
                            </td>
                            <td>{{ $infographic->title }}</td>
                            <td>{{ $infographic->category->name ?? 'ไม่ระบุ' }}</td>
                            <td>{{ $infographic->order }}</td>
                            <td>
                                @if($infographic->is_active)
                                <span class="badge bg-success">เปิดใช้งาน</span>
                                @else
                                <span class="badge bg-secondary">ปิดใช้งาน</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.infographics.edit', $infographic) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> แก้ไข
                                    </a>
                                    <form action="{{ route('admin.infographics.destroy', $infographic) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบ Infographic นี้?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i> ลบ
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-4">
                <h4>ยังไม่มี Infographic</h4>
                <p>คลิกที่ปุ่ม "เพิ่ม Infographic ใหม่" เพื่อเริ่มต้น</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection