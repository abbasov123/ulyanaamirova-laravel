@extends('layouts.app')

@section("content")

@if(session("deletemsg") || session("publish") || session("publishbook") ) 
<div class="alert alert-success"> 

    <p> {{session("deletemsg")}} </p> 
    <p> {{session("publish")}} </p>
    <p> {{session("publishbook")}} </p>

</div>
@endif



<div class="container">
 

    <div class="row justify-content-left">
    @foreach($books as $book)
        <div class="col-md-4">
        <span class="card-p-3">
        
        
        
            <div class="card shadow" style="max-width: 400px;">
                <div class="row no-gutters">
                    <div class="col-md-6 bg-transparent" style="">
                        <img src="storage/book/{{$book->book_img }}" class="card-img-top w-100 bg-transparent" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body" style="background :">
                            <h5 class="card-title text-center">{{ $book->book_name }}</h5>
                        
                            <p class="card-text text-left"> <small class="text-muted text-secondary">В тексте есть : <strong class="text-primary">{{ $book->genre }}</strong> </small></p>
                           

                            <small class="text-muted"> {{$book->description}} </small>
                            
                            <a href="{{ route('books.read',$book->id) }}" class="btn btn-outline-success btn-sm btn-block text-uppercase">Читать</a>
                        </div>

                        <div class="card-footer border-0 bg-transparent">
                            <small class="text-muted text-left">Публикация : {{ $book->created_at->format("d.m.Y") }}</small>

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

</div>


<!-- <div class="container">

    @foreach($books as $book)


        <a href="/books/{{$book->book_name}}" class="btn btn-success">{{ $book->heading }}</a>
    

    @endforeach



</div> -->






   
    

@endsection