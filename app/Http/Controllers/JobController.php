<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index',compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }
        return response()->json($job);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'category' => 'required|string',
            'salary' => 'required|string',
            'type' => 'required|string',
            'deadline' => 'required|date',
        ]);

        Job::create($validated);
        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }
    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit',compact('jobs'));
       // return response()->json($job);
    }
    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
        ]);

        $job->update($request->all());
        return redirect()->route('jobs.index');
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        $job->delete();
        return response()->json(['message' => 'Job deleted']);
    }
}
