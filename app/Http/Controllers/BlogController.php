<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function addBlog(){

        return view('admin.blog.add-blog',[
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }

    public function saveBlog(Request $request){

        Blog::saveBlog($request);
        return back()->with('message','success');
    }

    public function manageBlog(){

//        return $blogList=DB::table('blogs')
//                ->join('categories','blogs.category_id','categories.id')
//                ->join('authors','blogs.author_name','authors.id')
//                ->select('blogs.*','categories.category_name','authors.author_name')
//                ->get();
//        return $blogList;

//        return $blog = Blog::where('status',1)->with('category:id,category_name')->get();
//        return $blog = Blog::where('status',1)->with('category:id,category_name','author')->get();

        return view('admin.blog.manage-blog',[
            'blogList'=>DB::table('blogs')
                ->join('categories','blogs.category_id','categories.id')
                ->join('authors','blogs.author_name','authors.id')
                ->select('blogs.*','categories.category_name','authors.author_name')
                ->get()
        ]);
    }

    public function changeState($id){
        Blog::changeStatus($id);
        return back();
    }

    public function editBlog($id){
        return view('admin.blog.edit-blog',[
            'article' => Blog::find($id),
            'catList' => Category::all()
        ]);
    }

    public function updateBlog(Request $data){
        Blog::updateBlog($data);
        return redirect('/manageBlog')->with('message', 'Update Successful');
    }

    public function deleteBlog(Request $data){
        $item = Blog::find($data -> article_id);
        if ($item -> blog_image){
            unlink($item -> blog_image);
        }
        $item -> delete();
        return back() -> with('message', 'Deletion Successful');
    }



}













