@extends('layouts.master')

@section('content')

<h3 class="mb-3">📚 Khóa học</h3>

<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus"></i> Thêm khóa học
</a>

<div class="card p-3">

<table class="table table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Số lượng bài học</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($courses as $c)
        <tr>
            <td>
                @if($c->image)
                    <img src="{{ asset('storage/'.$c->image) }}" width="60" class="rounded">
                @endif
            </td>

            <td><strong>{{ $c->name }}</strong></td>

            <td title="{{ $c->description }}">
                {{ \Illuminate\Support\Str::limit($c->description,40) }}
            </td>

            <td>{{ number_format($c->price) }}đ</td>

            <td>
                <span class="badge bg-{{ $c->status == 'published' ? 'success':'secondary' }}">
                    {{ $c->status }}
                </span>
            </td>

            <td>{{ $c->lessons_count }}</td>

            <td>
                <a href="{{ route('courses.edit',$c->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i>
                </a>

                <form method="POST" action="{{ route('courses.destroy',$c->id) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

    
    {{ $courses->links('pagination::bootstrap-5') }}
</div>
    
@endsection