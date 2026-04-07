@extends('layouts.master')

@section('content')

<h3>🎥 Bài học</h3>

<a href="{{ route('lessons.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus"></i> Thêm bài học
</a>

<div class="card p-3 mb-3">
<form method="GET" class="row">
    <div class="col-md-4">
        <select name="course_id" class="form-control">
            <option value="">-- Tất cả khóa học --</option>
            @foreach($courses as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary">Lọc</button>
    </div>
</form>
</div>

<div class="card p-3">

<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>Tiêu đề</th>
            <th>Khóa học</th>
            <th>Thứ tự</th>
            <th>Video</th>
            <th></th>
        </tr>
    </thead>

    @foreach($lessons as $l)
    <tr>
        <td>{{ $l->title }}</td>
        <td>{{ $l->course->name }}</td>
        <td>{{ $l->order }}</td>
        <td>
            @if($l->video_url)
                <a href="{{ $l->video_url }}" target="_blank">▶️ Xem</a>
            @endif
        </td>
        <td>
            <a href="{{ route('lessons.edit',$l->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i>
            </a>

            <form method="POST" action="{{ route('lessons.destroy',$l->id) }}" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
    {{ $lessons->links('pagination::bootstrap-5') }}
</div>

@endsection