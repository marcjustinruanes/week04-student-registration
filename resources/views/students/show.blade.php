@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
<div class="profile-head">
    <div>
        <span class="eyebrow">REGISTRATION SUCCESSFUL</span>
        <h1>Student profile</h1>
        <p>Review the information saved to the student database.</p>
    </div>
    <a class="button secondary" href="{{ route('students.create') }}">+ New registration</a>
</div>

<div class="card profile-card">
    <div class="profile-visual">
        <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}">
        <span class="verified">&#10003; Registered</span>
    </div>

    <div class="profile-content">
        <div class="profile-title">
            <div>
                <span class="muted-label">STUDENT ID</span>
                <h2>{{ $student->full_name }}</h2>
                <p>{{ $student->student_id }} &ndash; {{ $student->program }}</p>
            </div>
        </div>

        <div class="detail-grid">
            <div><span>Email</span><strong>{{ $student->email }}</strong></div>
            <div><span>Mobile</span><strong>{{ $student->mobile_number }}</strong></div>
            <div><span>Date of Birth</span><strong>{{ $student->date_of_birth->format('F d, Y') }}</strong></div>
            <div><span>Gender</span><strong>{{ $student->gender }}</strong></div>
            <div><span>Year Level</span><strong>{{ $student->year_level }}</strong></div>
            <div><span>Registered</span><strong>{{ $student->created_at->format('M d, Y') }} &ndash; {{ $student->created_at->format('h:i A') }}</strong></div>
            <div class="full"><span>Address</span><strong>{{ $student->address }}</strong></div>
        </div>
    </div>
</div>
@endsection
