<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Mohammad Ilham",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nam odio dolor. Praesentium recusandae nobis commodi laboriosam, quasi,
                        beatae molestiae suscipit minima et placeat delectus fuga modi magni!
                        Qui, eius."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Teguhriyadi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nam odio dolor. Praesentium recusandae nobis commodi laboriosam, quasi,
                        beatae molestiae suscipit minima et placeat delectus fuga modi magni!
                        Qui, eius."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
