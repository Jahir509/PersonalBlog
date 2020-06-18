<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    protected $showPerPage = 3;

    public function index(){
        // \DB::enableQueryLog();
        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->showPerPage);

        return view('blog.index',compact('posts'));
        // dd(\DB::getQueryLog());
    }

    public function show($id){
         $post=Post::published()->findOrFail($id);


        return view('blog.show',compact('post'));
    }

    public function showBycategory(Category $category)
    {
        $categoryName= $category->title;
        
        $posts = $category->posts()
                    ->with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->showPerPage);
                    
        return view('blog.index',compact('posts','categoryName'));
       
    }
}
