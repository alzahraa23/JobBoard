<!-- resources/views/jobs/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Job</h1>

    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Job Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Job Description:</label>
            <textarea name="description" class="form-control" required>{{ $job->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Job Type:</label>
            <input name="type" class="form-control" required>
        </div>
        <!-- Add other fields like location, category, salary, etc. -->
        <button type="submit" class="btn btn-success">Update Job</button>
    </form>
</div>    
@endsection