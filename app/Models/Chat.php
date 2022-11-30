<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function messages(){
        return $this->hasMany('App\Models\Messagesent');
    }
}
