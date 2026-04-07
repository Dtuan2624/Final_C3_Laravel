@extends('layouts.master')

@section('content')

<h3>➕ Add Course</h3>

<div class="card p-3">

<form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
@csrf

<input name="name" placeholder="Tên khóa học" class="form-control mb-2">

<input name="price" placeholder="Giá" class="form-control mb-2">

<textarea name="description" placeholder="Mô tả" class="form-control mb-2"></textarea>

<label>  -- Ảnh --</label>
<input type="file" name="image" class="form-control mb-2">

<select name="status" class="form-control mb-2">
    <option value="draft">Draft</option>
    <option value="published">Published</option>
</select>

<button class="btn btn-success">Save</button>

</form>

</div>

@endsection