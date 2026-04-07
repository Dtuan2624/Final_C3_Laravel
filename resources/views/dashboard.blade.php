@extends('layouts.master')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row g-3">

    <div class="col-md-4">
        <div class="card p-3 text-center bg-primary text-white">
            <h5>Tổng số khóa học</h5>
            <h2>{{ $totalCourses }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center bg-success text-white">
            <h5>Tổng số học viên</h5>
            <h2>{{ $totalStudents }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center bg-warning text-dark">
            <h5>Doanh thu</h5>
            <h2>{{ number_format($revenue) }}</h2>
        </div>
    </div>

</div>

<div class="mt-5">
    <h4>🔥 Top 5 Khóa học </h4>
    <div class="card p-3">
        {{ $topCourse->name ?? 'No data' }}
    </div>
</div>

@endsection