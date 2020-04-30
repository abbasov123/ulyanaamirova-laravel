@extends('layouts.app')


@section("content")

<!-- <img src="storage/book/{{ $book->book_img }}" alt="" height="100" width="100"> -->



<div class="container text-center">

   


    
    <div class="card-header bg-info text-uppercase">
        <h1 class="text-white" style="">{{ $book->book_name }}</h1>
    </div>
 
    
    @for($i = 0; $i < count($book->headings); $i++)

        <div class="card p-3 border-0" style="">
            <div class="card-header text-primary border-0 text-uppercase">
            <h4><b>{{ $book->headings[$i] }}</b></h4>
                
            </div>
            
            <div class="card-body text-secondary">
                <blockquote class="blockquote mb-0">
                <p class="text-left">{{ $book->stories[$i] }}</p>
                <footer class="blockquote-footer">by  <cite title="Source Title">Ulyana Amirova</cite></footer>
                </blockquote>
            </div>
        </div>
        

    @endfor

    @guest

    

    @else

        <form action="{{ route('books.delete', $book->id) }}" method="POST">
            @csrf 
            @method("delete")
            <label for="" class="form-control border-0"></label>
            <button class="btn btn-outline-danger">Удалять</button>
            <label for="" class="form-control border-0 bg-transparent"></label>

        </form>


    @endguest



</div>





    
@guest

@else

   

@endguest

@endsection