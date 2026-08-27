@extends('layouts.app')

@section('title', 'Registered Students')

@section('content')
<div class="profile-head">
    <div>
        <span class="eyebrow">STUDENT DIRECTORY</span>
        <h1>Registered students</h1>
        <p>Records stored in the student registration database.</p>
    </div>
    <a class="button" href="{{ route('students.create') }}">+ Register student</a>
</div>

<div class="card table-card">
    @if($students->count())
        <div class="table-wrap">
            <table>
                <thead><tr><th>Student</th><th>Student ID</th><th>Program</th><th>Year</th><th>Email</th><th></th></tr></thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td><div class="student-cell"><img src="{{ asset('storage/' . $student->profile_picture) }}" alt=""><strong>{{ $student->full_name }}</strong></div></td>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->program }}</td>
                        <td>{{ $student->year_level }}</td>
                        <td>{{ $student->email }}</td>
                        <td><a class="view-link" href="{{ route('students.show', $student) }}">View &rsaquo;</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">{{ $students->links() }}</div>
    @else
        <div class="empty"><div class="empty-icon">+</div><h2>No students yet</h2><p>Register the first student to populate this directory.</p><a class="button" href="{{ route('students.create') }}">Register student</a></div>
    @endif
</div>
@endsection
