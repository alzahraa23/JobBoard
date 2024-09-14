<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Application;
use Spatie\Permission\Models\Role;
class DashboardController extends Controller
{
    // وظيفة عرض الصفحة الرئيسية للـ Dashboard بناءً على دور المستخدم
    public function index()
    {
        $user = Auth::user();  

        if ($user->user_role ==='employer') {
            
            $jobs = Job::where('employer_id', $user->id)->withCount('applications')->get();
           
            if ($jobs->isEmpty()) {
                return view('dashboard')->with('message', 'You have not applied for any jobs yet.');
            }
                return view('dashboard', compact('jobs'));
            
            
        } elseif ( $user->user_role==='candidate') 
             {
           
            $applications = Application::where('candidate_id', $user->id)->with('job')->get();
            if ($applications->isEmpty()) {
                return view('dashboard',
                [
                    'jobs'=>[],
                    'message'=> 'You have not applied for any jobs yet.'
                ]);
            }
            $jobs = $applications->groupBy('job_id')->map(function ($group) {
                return [
                    'job' => $group->first()->job,
                    'application_count' => $group->count(),
                    'status' => $group->first()->status,
                ];
            });
            return view('dashboard', compact('jobs'));
          
        } elseif ($user->user_role==='admin') {
            
            $applications = Application::with('candidate', 'job')->where('status', 'pending')->get();
            return view('admin_dashboard', compact('applications'));
        }

        
        return view('dashboard');  // العرض الافتراضي
    }
}
