<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tution extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function classType()
    {
        return $this->belongsTo(ClassType::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function applications()
    {
        return $this->hasMany(TutionApplication::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tuter_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
