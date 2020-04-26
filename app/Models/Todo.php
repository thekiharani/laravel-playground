<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	protected $fillable = [
        'user_id', 'name', 'slug', 'completed',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
