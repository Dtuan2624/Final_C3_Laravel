@extends('layouts.master')

@section('content')

<h3>Sửa đăng ký</h3>

<form method="POST" action="{{ route('enrollments.update', $enrollment->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Học viên</label>
    <input class="form-control" value="{{ $enrollment->student->name }}" disabled>
</div>

<div class="mb-3">
    <label>Email</label>
    <input class="form-control" value="{{ $enrollment->student->email }}" disabled>
</div>

<div class="mb-3">
    <label>Khóa học</label>
    <select name="course_id" class="form-control">
        @foreach($courses as $c)
            <option value="{{ $c->id }}" 
                {{ $enrollment->course_id == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select>
</div>

<button class="btn btn-primary">Cập nhật</button>

</form>

@endsection