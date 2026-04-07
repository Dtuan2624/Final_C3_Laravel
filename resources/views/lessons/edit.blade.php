@extends('layouts.master')

@section('content')

<h3>Sửa bài học</h3>

<form method="POST" action="{{ route('lessons.update', $lesson->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Khóa học</label>
    <select name="course_id" class="form-control">
        @foreach($courses as $c)
            <option value="{{ $c->id }}" {{ $lesson->course_id == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Tiêu đề</label>
    <input name="title" value="{{ $lesson->title }}" class="form-control">
</div>

<div class="mb-3">
    <label>Nội dung</label>
    <textarea name="content" class="form-control">{{ $lesson->content }}</textarea>
</div>

<div class="mb-3">
    <label>Video URL</label>
    <input name="video_url" value="{{ $lesson->video_url }}" class="form-control">
</div>

<div class="mb-3">
    <label>Thứ tự</label>
    <input name="order" value="{{ $lesson->order }}" class="form-control">
</div>

<button class="btn btn-primary">Cập nhật</button>

</form>

@endsection