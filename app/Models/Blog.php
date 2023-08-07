<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    private static $blog,$image,$imageNewName,$directory,$imgUrl,$details;

    public static function saveBlog($request){


        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->author_name = $request->author_name;
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeSlug($request);
        self::$blog->description = $request->description;
        self::$blog->blog_type = $request->blog_type;
        self::$blog->image = self::saveImage($request);
        self::$blog->date = $request->date;
        self::$blog->status = $request->status;
        self::$blog->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName ='blog-'.rand().'.'.self::$image->Extension();
        self::$directory='admin-asset/upload-image/blog/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    private static function makeSlug($request){
        if ($request->slug){
            $str = $request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }else{
            $str = $request->title;
            return preg_replace('/\s+/u','-',trim($str));
        }
    }

    public static function updateBlog($data){
        self::$details = Blog::find($data -> article_id);
        self::$details -> category_id = $data -> category_id;
        self::$details -> author_name = $data -> author_name;
        self::$details -> blog_title = $data -> blog_title;
        self::$details -> blog_slug = self::makeSlug($data);
        self::$details -> blog_description = $data -> blog_description;
        self::$details -> blog_type = $data -> blog_type;
        self::$details -> blog_date = $data -> blog_date;
        if ($data -> file('blog_image')){
            if (self::$details -> category_image){
                if (file_exists(self::$details -> category_image)){
                    unlink(self::$details -> category_image);
                    self::$details -> category_image =self::saveImage($data);
                }
            }else{
                self::$details -> category_image = self::saveImage($data);
            }
        }
        self::$details -> save();
    }


    public static function changeStatus($id){
        self::$details = Blog::find($id);
        if (self::$details -> status == 1){
            self::$details -> status = 0;
        }else{
            self::$details -> status = 1;
        }
        self::$details -> save();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

}












