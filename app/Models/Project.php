<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['title', 'customer', 'description', 'url', 'status'];

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}

