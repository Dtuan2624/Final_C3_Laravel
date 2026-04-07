<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        // Tổng số khóa học
        $totalCourses = Course::count();

        // Tổng số học viên
        $totalStudents = Student::count();

        // Tổng doanh thu (giả sử mỗi enrollment = 1 lần mua course)
        $revenue = Course::join('enrollments', 'courses.id', '=', 'enrollments.course_id')
            ->sum('courses.price');

        // Khóa học nhiều học viên nhất
        $topCourse = Course::withCount('enrollments')
            ->orderByDesc('enrollments_count')
            ->first();

        // 5 khóa học mới
        $latestCourses = Course::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCourses',
            'totalStudents',
            'revenue',
            'topCourse',
            'latestCourses'
        ));
    }
}
