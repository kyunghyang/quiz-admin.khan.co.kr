<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Template extends Model
{
    use HasFactory;

    protected $appends = [

    ];

    /*public function registerMediaCollections():void
    {
        $this->addMediaCollection('img_badge')->singleFile();
        $this->addMediaCollection('img_background')->singleFile();
    }*/

    /*public function getImgBadgeAttribute()
    {
        if($this->hasMedia('img_badge')) {
            $media = $this->getMedia('img_badge')[0];

            return [
                "name" => $media->file_name,
                "url" => $media->getFullUrl()
            ];
        }

        return null;
    }

    public function getImgBackgroundAttribute()
    {
        if($this->hasMedia('img_background')) {
            $media = $this->getMedia('img_background')[0];

            return [
                "name" => $media->file_name,
                "url" => $media->getFullUrl()
            ];
        }

        return null;
    }*/
}
