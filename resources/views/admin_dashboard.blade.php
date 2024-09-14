<!-- resources/views/admin_dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Pending Applications</h2>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Candidate</th>
                <th>Job</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
            <tr>
                <td>{{ $application->candidate->name }}</td>
                <td>{{ $application->job->title }}</td>
                <td>{{ ucfirst($application->status) }}</td>
                <td>
                    <form action="{{ route('applications.update', $application->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" name="status" value="approved" class="btn btn-success">Approve</button>
                        <button type="submit" name="status" value="rejected" class="btn btn-danger">Reject</button>
                        <button type="submit" name="status" value="pending" class="btn btn-warning">Keep Pending</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection