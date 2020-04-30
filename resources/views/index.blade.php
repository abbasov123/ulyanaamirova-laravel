@extends('layouts.app')



@section("content")



@if(session("deletemsg") || session("publish") || session("publishbook") ) 
<div class="alert alert-success text-success text-center text-uppercase"> 

    <p> {{session("deletemsg")}} </p> 
    <p> {{session("publish")}} </p>
    <p> {{session("publishbook")}} </p>

</div>
@endif




<div class="container">
    <div class="row justify-content-left">
        
        <div class="col-lg 6 col-md-6 col-sm-12 col-xs-12">
    @foreach($books as $book)
        <div class="row">
        <span class="card-p-3">

            <div class="card shadow border-0" style="max-width: 400px;">
                <div class="row no-gutters">
                    <div class="col-md-6 bg-transparent" style="">
                        <img src="storage/book/{{$book->book_img}}" class="card-img-top w-100" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body" style="">
                            <h5 class="card-title text-center">{{ $book->book_name }}</h5>
                        
                            
                            <p class="card-text text-left"> <small class="text-muted text-secondary">В тексте есть : <strong class="text-primary">{{ $book->genre }}</strong> </small></p>
                            <a href="{{ route('books.read',$book->id) }}" class="btn btn-outline-success btn-sm btn-block text-uppercase">Читать</a>
                        </div>

                        <div class="card-footer bg-transparent">
                            <small class="text-muted far fa-calendar-alt"> {{ $book->created_at->format("d.m.Y") }}</small>
                            
                            <span class="text-center text-secondary float-right">
                                <i class="far fa-eye" style="font-size:14px"> 
                                    <small class="text-muted"> {{$book->views}} </small>
                                </i>

                            </span>

                        </div>

                    </div>
                    </div>
                </div>
                

            </div>
        </span>
    @endforeach
    </div>


  

    <div class="col-md-8">
    <div class="row px-5">
    @foreach($blogs as $blog)
        <div class="col-lg 6 col-md-6 col-sm-12 col-xs-12 p-3">
            

            <span class="card border-0 bg-transparent">

                <div class="card shadow border-0" style="width: 18rem;">

                    <div class="card-img-wrap">
                    
                        <img src="storage/blogimg/{{$blog->blog_imgs[0]}}" class="card-img-top" alt="...">

                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text text-center"> <small class="text-muted text-secondary">В тексте есть : <strong class="text-primary">{{ $blog->genre }}</strong> </small></p>
                        
                        <a href="{{ route('blogs.read', $blog->id) }}" class="btn btn-outline-primary btn-sm btn-block text-uppercase">Читать</a>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted far fa-calendar-alt"> {{ $blog->created_at->format("d.m.Y") }}</small>
                       
                        <span class="text-center text-secondary float-right">
                                <i class="far fa-eye" style="font-size:14px"> 
                                    <small class="text-muted"> {{$blog->views}} </small>
                                </i>

                        </span>
                        
                    </div>

                </div>

            </span>

        </div>
    @endforeach
    </div>
    </div>
    </div>

</div>




@endsection