<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    // as fields are explicit, uses $guarded instead of $fillable
    protected $guarded = [];
}
