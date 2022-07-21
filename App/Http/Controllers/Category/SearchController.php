<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request){  
        $data = $request->validated();
        $categories = Category::where("title", "like", '%'.$data['search'].'%');
        dd($categories);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(6);
        return view('categories.index', compact('categories', 'popularPosts'));   
    }
}

