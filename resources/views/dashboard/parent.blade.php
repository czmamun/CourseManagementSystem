@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Parent Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    
    <h2>Manage Your Children</h2>
    <p>Here you can view and manage your children's information.</p>
    <!-- Add functionality for managing children -->
</div>
@endsection
