<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    use HasFactory;

    protected $fillable = [
        "curation_id",
        "url",
        "img_url",
        "order",
        "title_url"
    ];

    public function curation()
    {
        return $this->belongsTo(Curation::class);
    }
}

