<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutsController extends Controller
{
    public function admin(){

        return view("admin");
    }


    public function about(){


        $about = About::find(1);
        if($about){
           
        }else{

            $about = new About;
           
            $about->save();

        }
        return view("abouts.about",["about" => $about]);

    }


    public function edit_about(){

        $about = About::findOrFail(1);

        return view("abouts.about_edit",["about" => $about]);
    }

    public function save_about(Request $request){

        $about = About::findOrFail(1);

        $request->validate([
            'name'           =>  'required',
            'about'          =>  'required',
            "email"          => "required",
            "profile_img"      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            "inst"          => "required",
            "vk"          => "required",
            "litnet"          => "required"
            
        ]);
        
        $about->name = $request->input("name");

        $about->about = $request->input("about");

        $about->email = $request->input("email");

        if($request->hasFile("profile_img")){

            $imageName = time().".". $request->file("profile_img")->extension();
            $request->file("profile_img")->move(public_path('storage/about'), $imageName);


            $about->profile_img = $imageName;
        }

        $about->inst = $request->input("inst");
        $about->vk = $request->input("vk");   
        $about->litnet = $request->input("litnet");
       


        $about->save();

        return redirect("/about")->with("about","Updated successfully");

        // if(!$about->about || !$about->name || !$about->email){
        //     return view("abouts.about_edit", ["about"=>$about]);
        // }else{

        //     $about->save();

        //     return redirect("/about")->with("about","You updated sucessfully");

        // }

        

    }
}
