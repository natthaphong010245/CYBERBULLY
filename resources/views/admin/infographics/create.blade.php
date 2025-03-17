@extends('layouts.admin')

@section('title', 'เพิ่ม Infographic ใหม่')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">เพิ่ม Infographic ใหม่</h5>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.infographics.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">หัวข้อ</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="categories_infographics_id" class="form-label">หมวดหมู่</label>
                    <select class="form-select @error('categories_infographics_id') is-invalid @enderror" id="categories_infographics_id" name="categories_infographics_id" required>
                        <option value="">เลือกหมวดหมู่</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('categories_infographics_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories_infographics_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">รูปภาพ</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                    <small class="form-text text-muted">รูปภาพควรมีขนาดไม่เกิน 2MB และเป็นไฟล์ JPG, PNG, GIF หรือ WEBP</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">เนื้อหา</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                    <small class="form-text text-muted">คุณสามารถใช้ HTML เพื่อจัดรูปแบบเนื้อหาได้</small>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="order" class="form-label">ลำดับการแสดงผล</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', 0) }}">
                    <small class="form-text text-muted">ใช้สำหรับจัดลำดับการแสดงผล (น้อยไปมาก)</small>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">เปิดใช้งาน</label>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.infographics.index') }}" class="btn btn-secondary">ยกเลิก</a>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection