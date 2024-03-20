<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    public $hidden = ['pivot', 'id'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
