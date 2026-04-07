<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // Danh sách đăng ký
    public function index(Request $request)
    {
        $courseId = $request->course_id;

        $courses = Course::all();

        $enrollments = Enrollment::with(['course','student'])
            ->when($courseId, function($q) use ($courseId){
                $q->where('course_id', $courseId);
            })
            ->latest()
            ->paginate(5);

        return view('enrollments.index', compact('enrollments','courses'));
    }

    // Form đăng ký
    public function create()
    {
        $courses = Course::all();
        return view('enrollments.create', compact('courses'));
    }

    // Lưu đăng ký
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        // tạo hoặc lấy student
        $student = Student::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // tránh trùng
        $exists = Enrollment::where('course_id',$request->course_id)
            ->where('student_id',$student->id)
            ->exists();

        if($exists){
            return back()->with('error','Đã đăng ký rồi');
        }

        Enrollment::create([
            'course_id' => $request->course_id,
            'student_id' => $student->id
        ]);

        return redirect()->route('enrollments.index')
            ->with('success','Đăng ký thành công');
    }

    // Xóa đăng ký
    public function destroy($id)
    {
        Enrollment::destroy($id);

        return back()->with('success','Đã xóa');
    }
    //Edit
    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $courses = Course::all();

        return view('enrollments.edit', compact('enrollment','courses'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);

        $enrollment = Enrollment::findOrFail($id);

        // check trùng (course + student)
        $exists = Enrollment::where('course_id', $request->course_id)
            ->where('student_id', $enrollment->student_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Học viên đã đăng ký khóa này rồi');
        }

        $enrollment->update([
            'course_id' => $request->course_id
        ]);

        return redirect()->route('enrollments.index')
            ->with('success', 'Cập nhật thành công');
    }
}
