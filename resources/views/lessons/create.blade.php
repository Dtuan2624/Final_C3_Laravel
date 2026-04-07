@extends('layouts.master')

@section('content')

<h3>Thêm bài học</h3>

<form method="POST" action="{{ route('lessons.store') }}">
@csrf

<div class="mb-3">
    <label>Khóa học</label>
    <select name="course_id" class="form-control">
        @foreach($courses as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Tiêu đề</label>
    <input name="title" class="form-control">
</div>

<div class="mb-3">
    <label>Nội dung</label>
    <textarea name="content" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Video URL</label>
    <input name="video_url" class="form-control">
</div>

<div class="mb-3">
    <label>Thứ tự</label>
    <input name="order" type="number" class="form-control">
</div>

<button class="btn btn-success">Lưu</button>

</form>

@endsection