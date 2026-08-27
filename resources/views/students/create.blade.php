@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
<div class="hero">
    <div>
        <span class="eyebrow">ITST 302 &ndash; WEEK 4</span>
        <h1>Register a student</h1>
        <p>Create a secure student record with validated information and a profile picture.</p>
    </div>
    <div class="hero-badge">
        <span class="status-dot"></span>
        Secure registration
    </div>
</div>

@if($errors->any())
<div class="alert error">
    <span class="alert-icon">!</span>
    <div style="flex:1">
        <strong>Please review your submission</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button onclick="this.closest('.alert').remove()" style="background:none;border:0;cursor:pointer;color:inherit;opacity:.6;font-size:18px;line-height:1;padding:0 2px">&times;</button>
</div>
@endif

<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="card form-card">
    @csrf

    <section class="form-section">
        <div class="section-heading">
            <div class="section-number">01</div>
            <div><h2>Student identity</h2><p>Basic information used to identify the student.</p></div>
        </div>

        <div class="grid grid-3">
            <div class="field">
                <label for="student_id">Student ID <span>*</span></label>
                <input id="student_id" name="student_id" value="{{ old('student_id') }}" placeholder="e.g. 20260001" inputmode="numeric" pattern="[0-9]+" required>
                @error('student_id')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="first_name">First Name <span>*</span></label>
                <input id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Juan" required>
                @error('first_name')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="middle_name">Middle Name</label>
                <input id="middle_name" name="middle_name" value="{{ old('middle_name') }}" placeholder="S" maxlength="1" pattern="[A-Za-z]">
                @error('middle_name')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="last_name">Last Name <span>*</span></label>
                <input id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Dela Cruz" required>
                @error('last_name')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="email">Email Address <span>*</span></label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="juan@example.com" required>
                @error('email')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="mobile_number">Mobile Number <span>*</span></label>
                <input id="mobile_number" type="tel" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="09171234567" inputmode="numeric" pattern="09[0-9]{9}" maxlength="11" required oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,11)">
                @error('mobile_number')<small>{{ $message }}</small>@enderror
            </div>
        </div>
    </section>

    <section class="form-section">
        <div class="section-heading">
            <div class="section-number">02</div>
            <div><h2>Academic information</h2><p>Program and enrollment details.</p></div>
        </div>

        <div class="grid grid-3">
            <div class="field">
                <label for="date_of_birth">Date of Birth <span>*</span></label>
                <input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="gender">Sex <span>*</span></label>
                <select id="gender" name="gender" required>
                    <option value="" disabled @selected(!old('gender'))>Select sex</option>
                    @foreach(['Male','Female'] as $option)
                        <option value="{{ $option }}" @selected(old('gender') === $option)>{{ $option }}</option>
                    @endforeach
                </select>
                @error('gender')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="year_level">Year Level <span>*</span></label>
                <select id="year_level" name="year_level" required>
                    <option value="" disabled @selected(!old('year_level'))>Select year</option>
                    @foreach(['1st Year','2nd Year','3rd Year','4th Year'] as $option)
                        <option value="{{ $option }}" @selected(old('year_level') === $option)>{{ $option }}</option>
                    @endforeach
                </select>
                @error('year_level')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field field-wide">
                <label for="program">Program <span>*</span></label>
                <input id="program" name="program" value="{{ old('program') }}" placeholder="BS Information Technology" required>
                @error('program')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field field-wide">
                <label for="address">Address <span>*</span></label>
                <textarea id="address" name="address" rows="3" placeholder="House / Street, Barangay, Municipality, Province" required>{{ old('address') }}</textarea>
                @error('address')<small>{{ $message }}</small>@enderror
            </div>
        </div>
    </section>

    <section class="form-section">
        <div class="section-heading">
            <div class="section-number">03</div>
            <div><h2>Profile picture</h2><p>Upload a JPG or PNG image up to 2 MB.</p></div>
        </div>

        <label class="upload-box" for="profile_picture" id="upload-label">
            <img id="img-preview" src="" alt="" style="display:none;max-height:140px;border-radius:10px;object-fit:cover;margin-bottom:8px">
            <span class="upload-icon" id="upload-icon">&#8679;</span>
            <strong id="upload-title">Choose profile picture</strong>
            <span id="file-name">JPG, JPEG or PNG &ndash; Maximum 2 MB</span>
            <input id="profile_picture" type="file" name="profile_picture" accept=".jpg,.jpeg,.png,image/jpeg,image/png" required onchange="(function(f){if(!f)return;document.getElementById('file-name').textContent=f.name;document.getElementById('upload-title').textContent='Change picture';document.getElementById('upload-icon').style.display='none';var r=new FileReader();r.onload=function(e){var p=document.getElementById('img-preview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(f)})(this.files[0])">
        </label>
        @error('profile_picture')<small class="upload-error">{{ $message }}</small>@enderror
    </section>

    <div class="form-footer">
        <span><b>*</b> Required fields</span>
        <button class="button" type="submit">Register student <span>&rsaquo;</span></button>
    </div>
</form>
@endsection
