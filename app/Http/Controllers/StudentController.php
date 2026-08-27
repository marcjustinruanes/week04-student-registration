<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(15);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id'      => 'required|digits_between:1,50|unique:students',
            'first_name'      => 'required|string|max:100',
            'middle_name'     => 'nullable|regex:/^[A-Za-z]$/|max:1',
            'last_name'       => 'required|string|max:100',
            'email'           => 'required|email:rfc,dns|unique:students',
            'mobile_number'   => 'required|regex:/^09\d{9}$/',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required|in:Male,Female',
            'program'         => 'required|string|max:150',
            'year_level'      => 'required|in:1st Year,2nd Year,3rd Year,4th Year',
            'address'         => 'required|string',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');

        $student = Student::create($data);

        return redirect()->route('students.show', $student)->with('success', 'Student registered successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
