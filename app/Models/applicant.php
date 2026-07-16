<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    //
    public function vacancy(){
        return $this->belongsTo(vacancy::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
