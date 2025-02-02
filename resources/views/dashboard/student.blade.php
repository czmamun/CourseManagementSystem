@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    
    <h2>Course Registration</h2>
    <form action="{{ route('courses.register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course">Select Course:</label>
            <select name="course" id="course" class="form-control" required>
                <option value="">-- Select Course --</option>
                <!-- Add course options dynamically -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
