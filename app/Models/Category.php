<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Relacion uno a muchos

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function subcategorys(){
        return $this->hasMany(Subcategory::class);
    }

}
