<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Welcome to your Dashboard, {{ Auth::user()->username }}!</h1>
        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        @if(Auth::user()->user_role=='employer')
        <!-- Employer's dashboard -->
        <h2>Employer Panel</h2>
        <p>Manage your job postings, review applications, and access analytics.</p>
        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <div class="dashboard-section">
            <h3>Your Job Listings</h3>
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Salary</th>
                            <th>Application Count</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location}}</td>
                                <td>{{ $job->type}}</td>
                                <td>{{ $job->salary}}</td>
                                <td>{{ $job->application_count}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No jobs available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            <a href="{{ route('jobs.create') }}" class="btn btn-primary">Announce New Job </a>
        </div>

        <div class="dashboard-section">
            <h3>Analytics</h3>
            <p>Track the performance of your job listings.</p>
            <!-- يمكن إضافة إحصائيات هنا -->
        </div>

        @elseif(Auth::user()->user_role=='candidate')
        <!-- Candidate's dashboard -->
        <h2>Candidate Panel</h2>
        <p>Search for jobs, apply to postings, and manage your profile.</p>
        @if (session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
        @endif
        <div class="dashboard-section">
            <h3>Your Job Applications</h3>
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Applications Count</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($jobs)&& count($jobs)>0)
                            @foreach($jobs as $jobData)
                                <tr>
                                    <td>{{ $jobData['job']->title }}</td>
                                    <td>{{ $jobData['application_count'] }}</td>
                                    <td>{{ $jobData['status'] }}</td>
                                </tr> 
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No applications found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
        </div>

        <div class="dashboard-section">
            <h3>Search for Jobs</h3>
            <a href="{{ route('jobs.index') }}" class="btn btn-primary"> Register for Another Job</a>
  
        </div>  

        @elseif(Auth::user()->user_role=='admin')
        <!-- Admin's dashboard -->
        <h2>Admin Panel</h2>
        <p>Approve or reject job postings and monitor platform activity.</p>

        <div class="dashboard-section">
            <h3>Pending Job Postings</h3>
            <ul>
                @foreach($pendingJobs as $job)
                <li>{{ $job->title }} - Posted by: {{ $job->employer->name }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    @endsection
</body>

</html>