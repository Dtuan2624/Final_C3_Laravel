<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('lessons')->paginate(5);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpg,png|max:2048'
        ]);
         // upload ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }
        Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('courses.index')->with('success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:1',
        'image' => 'image|mimes:jpg,png|max:2048'
    ]);

    $course = Course::findOrFail($id);

    $data = $request->all();

    // update slug
    $data['slug'] = Str::slug($request->name);

    // upload ảnh mới
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('courses','public');
    } else {
        $data['image'] = $course->image; // giữ ảnh cũ
    }

    $course->update($data);

    return redirect()->route('courses.index')
        ->with('success','Cập nhật thành công');
}

    public function destroy($id)
    {
        Course::destroy($id);
        return back();
    }
}
