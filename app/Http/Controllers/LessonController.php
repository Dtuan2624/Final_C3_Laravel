<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // Danh sách bài học (theo course)
    public function index(Request $request)
    {
        $courseId = $request->course_id;

        $courses = Course::all();

        $lessons = Lesson::with('course')
            ->when($courseId, function($q) use ($courseId){
                $q->where('course_id', $courseId);
            })
            ->orderBy('order')
            ->paginate(5);

        return view('lessons.index', compact('lessons','courses'));
    }

    // Form thêm
    public function create()
    {
        $courses = Course::all();
        return view('lessons.create', compact('courses'));
    }

    // Lưu
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
            'order' => 'numeric'
        ]);

        Lesson::create($request->all());

        return redirect()->route('lessons.index')
            ->with('success','Thêm bài học thành công');
    }

    // Form sửa
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::all();

        return view('lessons.edit', compact('lesson','courses'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->update($request->all());

        return redirect()->route('lessons.index')
            ->with('success','Cập nhật thành công');
    }

    // Xóa
    public function destroy($id)
    {
        Lesson::destroy($id);

        return back()->with('success','Đã xóa');
    }
}
