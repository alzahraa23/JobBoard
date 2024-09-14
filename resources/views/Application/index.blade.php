<!-- resources/views/applications/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Applications</h1>

    @if($applications->isEmpty())
        <p>No applications available.</p>
    @else
        @foreach($applications as $application)
        <p>candidate:{{ $application->candidate->name }}</p>
        <p>Request_status: {{ $application->status }}</p>

         <form action="{{ route('applications.update', $application->id) }}" method="POST">
             @csrf
             @method('POST')
             <select name="status">
                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Reiected</option>
            </select>
            <button type="submit">Status_update</button>
        </form>
        @endforeach
    @endif
@endsection