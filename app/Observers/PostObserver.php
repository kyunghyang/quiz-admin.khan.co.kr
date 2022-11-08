<?php

namespace App\Observers;

use App\Mail\PostCreated;
use App\Models\Post;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class PostObserver
{
    public function created(Post $post)
    {
        $subscribes = Subscribe::where("blog_id", $post->blog_id)->cursor();

        foreach($subscribes as $subscribe){
            $user = User::find($subscribe->user_id);

            Mail::to($user->email)->queue(new PostCreated($user, $post->blog, $post));
        }
    }
}
