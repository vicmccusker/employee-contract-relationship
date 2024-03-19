<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $hidden = ['pivot'];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function certifications()
    {
        return $this->belongsToMany(Certification::class);
    }
}
