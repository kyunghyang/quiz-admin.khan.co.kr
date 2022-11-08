<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "url",
        "category",
        "count_text",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
