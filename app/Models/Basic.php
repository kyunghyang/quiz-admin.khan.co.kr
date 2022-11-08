<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    use HasFactory;

    protected $fillable = [
        "point_level_up",
        "point_read_history",
        "point_question",
        "point_curation",
    ];
}
