@extends('layouts.master')

@section('content')

<h3>🎓 Danh sách học viên</h3>

<a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus"></i> Đăng kí
</a>

<div class="card p-3">

<table class="table table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Học sinh</th>
            <th>Email</th>
            <th>Khóa học</th>
            <th></th>
        </tr>
    </thead>

    @foreach($enrollments as $e)
    <tr>
        <td><strong>{{ $e->student->name }}</strong></td>
        <td>{{ $e->student->email }}</td>
        <td>
            <span class="badge bg-info">
                {{ $e->course->name }}
            </span>
        </td>
        <td>
            <a href="{{ route('enrollments.edit',$e->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i>
            </a>

            <form method="POST" action="{{ route('enrollments.destroy',$e->id) }}" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
    {{ $enrollments->links('pagination::bootstrap-5') }}
</div>

@endsection