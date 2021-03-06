<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(5);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(6);
        return view('main.index', compact('posts', 'popularPosts'));   
    }
}
