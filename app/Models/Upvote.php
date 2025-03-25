<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    public $timestamps = false;
    protected $fillable = ['upvote', 'feature_id', 'user_id'];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
