<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutionApplication extends Model
{
    use HasFactory;

    public function tution(){
        return $this->belongsTo(Tution::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}

