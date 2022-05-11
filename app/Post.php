<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'category_id',
        'slug',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    // public function getDate( $d ) {
        
    //     if($d) {

    //         $date = Carbon::createFromFormat('Y-m-d H:i:s',$d);

    //         return $date->format('l j F');

    //     } else {

    //         return Carbon::now();
    //     }
    // }

    public static function getUniqueSlug( $title ) {

        $slug = Str::slug( $title );
        $slug_base = $slug;
        // dd($slug);
        $counter = 1;

        $post_present = Post::where('slug',$slug)->first();

        while( $post_present ){
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug',$slug)->first();
        }

        return $slug;

    }
}
