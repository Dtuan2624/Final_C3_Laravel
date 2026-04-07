@extends('layouts.master')

@section('content')

<h3>Đăng ký khóa học</h3>

<form method="POST" action="{{ route('enrollments.store') }}">
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
    <label>Tên học viên</label>
    <input name="name" class="form-control">
</div>

<div class="mb-3">
    <label>Email</label>
    <input name="email" class="form-control">
</div>

<button class="btn btn-success">Đăng ký</button>

</form>

@endsection