<!-- resources/views/applications/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Application from {{ $application->name }}</h1>
    <p>Email: {{ $application->email }}</p>
    <p>Cover Letter: {{ $application->cover_letter }}</p>
    <!-- Add more details like resume, etc. -->
@endsection