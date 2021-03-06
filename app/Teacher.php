<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'gender',
        'phone',
        'dateofbirth',
        'subject_id',
        'current_address',
        'permanent_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function classes()
    {
        return $this->hasMany(Grade::class);
    }

    public function students()
    {
        return $this->classes()->withCount('students');
    }
}
