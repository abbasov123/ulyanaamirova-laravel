<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Book;


class BlogsController extends Controller
{
    //

    public function index(){

        $blogs = Blog::orderBy("created_at","desc")->get();

        $books = Book::orderBy("created_at","desc")->get();

        // return view("index",["blogs" => $blogs]);

        // return view("test01");
        return view("index",["blogs" => $blogs, "books" => $books]);

        // return view("test01",["blogs" => $blogs, "books" => $books]);
    }

    public function blogs(){

        $blogs = Blog::orderBy("created_at","desc")->get();

        

        // return view("index",["blogs" => $blogs]);
        return view("blogs.blogs",["blogs" => $blogs]);
    }



  

    public function write(){

        return view("blogs.write");

    }

    public function publish(Request $request){

        $blog = new Blog;

        $request->validate([
            'title'           =>  'required',
            'genre'           =>  'required',
            'story'             =>  'required',
            'blog_imgs.*'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $blog->title = $request->input("title");
        $blog->genre = $request->input("genre");
        $blog->description = $request->input("description");
        $blog->story = $request->input("story");
        
        $imgs = array();

        if($request->hasFile("blog_imgs")){

            foreach($request->file("blog_imgs") as $blog_img){

                $imageName = rand(1,1000).time().".". $blog_img->extension();
                $blog_img->move(public_path('storage/blogimg'), $imageName);

                $imgs[] = $imageName;

            }
    
    
            $blog->blog_imgs = $imgs;

        }
       

        $blog->save();
        

        return redirect("/")->with("publish","Shared successfully");


        //$blog->heading = request("heading");
        // return request("heading");


    }

    public function read($id){

        $blog = Blog::findOrFail($id);

        $blog->views +=1;
        $blog->save();


        return view("blogs.read",["blog"=>$blog]);

    }

    


    public function delete($id){
        $blog = Blog::findOrFail($id);

        foreach($blog->blog_imgs as $blog_img){

            unlink(public_path('storage\blogImg')."/$blog_img");

        }
        $blog->delete();

        return redirect("/")->with("deletemsg", "Deleted successfully");

        
    }

    public function home(){
        return view ("home");
    }

   
    

}
