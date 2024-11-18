<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role'
    ];

    // Define the relationship with User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
