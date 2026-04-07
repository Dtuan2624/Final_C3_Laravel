@extends('layouts.master')

@section('content')

<h3>Sửa khóa học</h3>
<div class="card p-3">
<form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Tên khóa học</label>
    <input name="name" value="{{ $course->name }}" class="form-control">
</div>

<div class="mb-3">
    <label>Giá</label>
    <input name="price" value="{{ $course->price }}" class="form-control">
</div>

<div class="mb-3">
    <label>Mô tả</label>
    <textarea name="description" class="form-control">{{ $course->description }}</textarea>
</div>

<div class="mb-3">
    <label>Ảnh hiện tại</label><br>
    @if($course->image)
        <img src="{{ asset('storage/'.$course->image) }}" width="150">
    @endif
</div>

<div class="mb-3">
    <label>Chọn ảnh mới</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="mb-3">
    <label>Trạng thái</label>
    <select name="status" class="form-control">
        <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>Published</option>
    </select>
</div>

<button class="btn btn-primary">Cập nhật</button>

</form>
</div>
@endsection