<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;

    public $hidden = ['pivot', 'id', 'created_at', 'updated_at'];

    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
