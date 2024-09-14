<!-- resources/views/jobs/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4" >
        <h1 class="mb-4">Job Listings</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>location</th>
                    <th>category</th>
                    <th>salary</th>
                    <th>type</th>
                    <th>deadline</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->title}}</td>
                    <td>{{$job->description}}</td>
                    <td>{{$job->location}}</td>
                    <td>{{$job->category}}</td>
                    <td>{{$job->salary}}</td>
                    <td>{{$job->type}}</td>
                    <td>{{$job->deadline}}</td>
                    <td>
                        <form action="{{ route('applications.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection