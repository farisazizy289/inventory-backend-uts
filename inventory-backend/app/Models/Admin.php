<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'email', 'password'];

    public function items()
    {
        return $this->hasMany(Item::class, 'created_by');
    }
}