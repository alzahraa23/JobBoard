<!-- resources/views/jobs/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $job->title }}</h1>
    <p>{{ $job->description }}</p>
    <!-- Add more job details like location, category, salary, etc. -->
    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning">Edit Job</a>
    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Job</button>
    </form>
@endsection