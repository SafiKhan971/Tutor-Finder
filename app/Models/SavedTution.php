<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedTution extends Model
{
    use HasFactory;
    public function tution(){
        return $this->belongsTo(Tution::class);
    }
}
