<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
class ApplicationController extends Controller
{
    public function index()
    {
        $user = auth::user();
    
    // الحصول على طلبات التقديم الخاصة بالمستخدم
    $applications = Application::where('user_id', $user->id)->with('job')->get();

    // الحصول على عدد الطلبات
    $applicationCount = $applications->count();
    return view('applications.index', compact('applications', 'applicationCount'));
    }

    public function show($id)
    {
        $application = Application::find($id);
        if (!$application) {
            return response()->json(['message' => 'Application not found'], 404);
        }
        return response()->json($application);
    }

    public function store(Request $request)
    {
       $validated= $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'applicant_name' => 'required|string|max:255',
            'resume' => 'required|string',
        ]);
        $application = new Application();
        $application->job_id = $validated['job_id'];
        $application->user_id = Auth::id(); // معرف المستخدم المتقدم
        $application->applicant_name = $validated['applicant_name'];
        $application->save();

        // إرسال الاستجابة
        return redirect()->route('jobs.index')->with('success', 'Application submitted successfully');
    }

    /*public function update(Request $request, $id)
    {
        $application = Application::find($id);
        if (!$application) {
            return response()->json(['message' => 'Application not found'], 404);
        }

        $request->validate([
            'job_id' => 'exists:jobs,id',
            'applicant_name' => 'string|max:255',
            'resume' => 'string',
        ]);

        $application->update($request->all());
        return response()->json($application);
    } */
    public function update(Request $request, $id)
    {
        $application = Application::find($id);
        $application->status = $request->input('status');
        $application->save();

        return redirect()->route('admin.dashboard')->with('success', 'Application status updated successfully.');
    }
    

    public function destroy($id)
    {
        $application = Application::find($id);
        if (!$application) {
            return response()->json(['message' => 'Application not found'], 404);
        }

        $application->delete();
        return response()->json(['message' => 'Application deleted']);
    }
}
