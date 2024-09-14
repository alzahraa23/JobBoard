<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'location',
        'category',
        'salary',
        'type',
        'deadline',
      
    ];
    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
    // في نموذج Job
    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}
