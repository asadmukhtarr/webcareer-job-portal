<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    // inverse relationship
    public function company(){
        return $this->belongsTo(User::class);
    }
    // 
    public function vanacy(){
        return $this->hasMany(vacancy::class);
    }
}
