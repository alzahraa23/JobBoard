<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
// عرض قائمة الوظائف
Route::get('/jobs', [JobController::class, 'index']);

// عرض تفاصيل وظيفة معينة
Route::get('/jobs/{id}', [JobController::class, 'show']);

// إنشاء وظيفة جديدة
Route::post('/jobs', [JobController::class, 'store']);

// تحديث وظيفة موجودة
Route::put('/jobs/{id}', [JobController::class, 'update']);

// حذف وظيفة
Route::delete('/jobs/{id}', [JobController::class, 'destroy']);

// عرض قائمة التطبيقات
Route::get('/applications', [ApplicationController::class, 'index']);

// عرض تفاصيل طلب معين
Route::get('/applications/{id}', [ApplicationController::class, 'show']);

// إنشاء طلب جديد
Route::post('/applications', [ApplicationController::class, 'store']);

// تحديث طلب موجود
Route::put('/applications/{id}', [ApplicationController::class, 'update']);

// حذف طلب
Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);