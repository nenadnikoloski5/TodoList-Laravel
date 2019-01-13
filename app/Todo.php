<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //

    protected $fillable = [
        "todoName", "user_id"
    ];

    // public function User(){
    //     return $this->belongsTo("App\User", "user_id");
    // }
}
