@extends('layouts.admin')

@section('title', 'จัดการหมวดหมู่')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">จัดการหมวดหมู่</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> เพิ่มหมวดหมู่ใหม่
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
            @if($categories->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>รูปภาพ</th>
                            <th>ชื่อหมวดหมู่</th>
                            <th>คำอธิบาย</th>
                            <th>จำนวน Infographic</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                @if($category->image)
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" width="50">
                                @else
                                <span class="text-muted">ไม่มีรูปภาพ</span>
                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($category->description, 50) }}</td>
                            <td>{{ $category->infographics->count() }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> แก้ไข
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบหมวดหมู่นี้?');">
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
                <h4>ยังไม่มีหมวดหมู่</h4>
                <p>คลิกที่ปุ่ม "เพิ่มหมวดหมู่ใหม่" เพื่อเริ่มต้น</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ถ้ามีสคริปต์อื่นๆ ที่ต้องการเพิ่ม
</script>
@endpush