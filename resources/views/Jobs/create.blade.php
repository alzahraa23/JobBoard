<!-- resources/views/jobs/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Job</h1>

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Job Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Job Description:</label>
            <input name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" name="salary" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Job Type:</label>
            <input name="type" class="form-control" required>
        </div> 
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input name="deadline" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Create Job</button>
    </form>
</div>
@endsection