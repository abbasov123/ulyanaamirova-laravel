<?php

namespace App\Http\Controllers;
use Validator;
use App\Book;


use Illuminate\Http\Request;

class BooksController extends Controller
{
    //


    public function books(){
        $books = Book::orderBy("created_at", "desc")->get();


        return view ("books.books", ["books" => $books]);


    }

    public function write(){

        // return view("books.test1");
        return view("books.publish");
        // return view("books.test2");


    }


    public function publish(Request $request){

       
        // if($request->book_name){
        //     foreach($request->headings as $item=>$product){

        //         $book = new Book();
        //         // $data = array(
        //         //     "book_name" => $request->book_name,
        //         //     "book_img" => "null",
        //         //     "book_id" => 0,
        //         //     "heading" => $request->headings[$item],
        //         //     "story" => $request->stories[$item],

        //         // );

        //         // Book::insert($data);


        //         $book->book_name = $request->book_name;

        //         $book->book_id = 0;
        //         $book->heading = $request->headings[$item];
        //         $book->story = $request->stories[$item];

        //         $book->save();



        //     }

        //     return redirect("/")->with("publishbook","You published successfully");

        // }else{

        //     return redirect("/publish");
        // }




        $book = new Book();


        $request->validate([
            'book_name'    => 'required',
            "genre"        => "required",
            'headings'     =>  'required',
            'stories'      =>  'required',
            'book_img'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $book->book_name = request("book_name");
        $book->genre = request("genre");
        $book->description = request("description");

        $book->headings = request("headings");
        $book->stories = request("stories");
        
        if($request->hasFile("book_img")){

            $imageName = time().".". $request->file("book_img")->extension();
            $request->file("book_img")->move(public_path('storage/book'), $imageName);
    
    
            $book->book_img = $imageName;

        }

        $book->save();


        return redirect("/")->with("publishbook","Published successfully");
        //return redirect("/")->with("publish","You have published sucessfully");



    }

    public function read($id){

        $book = Book::findOrFail($id);
        // $book = Book::where("book_name", $bookName)->get();
        $book->views +=1;
        $book->save();


        return view("books.readbook",["book"=>$book]);

    }

       
    public function delete($id){
        $book = Book::findOrFail($id);
        unlink(public_path("storage\book")."/$book->book_img");

        $book->delete();

        return redirect("/")->with("deletemsg", "Deleted successfully");
    }
    

    
}
