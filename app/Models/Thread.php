<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function thread() {
        return $this->belongsTo('App\Models\Board');
    }

    public function threadComments() {
        return $this->belongsTo('App\Models\Comment');
    }
}