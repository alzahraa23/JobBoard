<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id'); 
    }
    public function candidate() {
        return $this->belongsTo(User::class, 'candidate_id');
    }
}
