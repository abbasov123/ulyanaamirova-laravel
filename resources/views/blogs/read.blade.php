@extends('layouts.app')


@section("content")


<div class="container text-center">

   

        <div class="card p-3 border-0" style="">
            <div class="card-header text-primary border-0 text-uppercase">
            <h4><b>{{ $blog->title }}</b></h4>
                
            </div>
            
            <div class="card-body text-secondary">
                <blockquote class="blockquote mb-0">

                <p class="text-left">{!! $blog->story !!}</p>

                <footer class="blockquote-footer">by  <cite title="Source Title">Ulyana Amirova </cite></footer>
                <!-- <footer class="blockquote-footer">Created at : <cite title="Source Title">{{ $blog->created_at->format("d.m.Y") }}</cite></footer> -->
                </blockquote>
            </div>
        </div>



        <div class="row justify-content-center">
        @foreach($blog->blog_imgs as $blog_img)

            <div class="col-md-4">
            
                <div class="card-p-3">

                    <div class="card border-0 bg-transparent">
                    
                        <div class="card bg-transparent border-0">
                            <div class="blog-img-wrap">

                                <img class="card-img-top" src="storage/blogimg/{{$blog_img}}" alt="Card image cap">
                                
                            </div>
                        </div>  
                    
                    </div>
                
                </div>
            
            </div>

           
        @endforeach
        
        </div>
        


    @guest

    

    @else

        <form action="{{ route('blogs.delete', $blog->id) }}" method="POST">
            @csrf 
            @method("delete")
            <label for="" class="form-control border-0"></label>
            <button class="btn btn-outline-danger">Удалять</button>
            <label for="" class="form-control border-0"></label>

        </form>



    @endguest



</div>






@endsection