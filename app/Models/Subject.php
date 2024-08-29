<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id', 'id');
    }
}
