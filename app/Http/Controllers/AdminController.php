<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {
        // جلب جميع الطلبات مع المرشحين
        $applications = Application::with('candidate')->get();

        return view('applications.index', compact('applications'));
        
        if (Auth::user()->roles->contains('user_role', 'admin')) {
            return view('admin_dashboard'); // عرض لوحة التحكم من المسار resources/views
        }

        // إذا لم يكن المستخدم admin، يمكنك إعادة توجيهه إلى صفحة أخرى أو عرض رسالة
        return redirect('/')->with('error', 'Access Denied');
    }

    public function updateStatus(Request $request, Application $application)
    {
        // تحديث حالة الطلب بناءً على طلب الـ admin
        $request->validate([
            'status' => 'required|in:accepted,rejected,pending',
        ]);

        $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'The request status has been updated successfully.');
    }
}
