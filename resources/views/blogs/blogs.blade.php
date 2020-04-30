@extends('layouts.app')

@section("content")





<div class="container">

    
    <div class="row justify-content-left  px-5">
    
    @foreach($blogs as $blog)
        <div class="col-lg 6 col-md-6 col-sm-12 col-xs-12">
            

            <span class="card-p-3">

                <div class="card bg-transparent shadow border-0" style="width: 18rem;">

                    <div class="card-img-wrap">
                    
                        <img src="storage/blogImg/{{$blog->blog_imgs[0]}}" class="card-img-top" alt="...">

                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text text-center"> <small class="text-muted text-secondary">В тексте есть : <strong class="text-primary">{{ $blog->genre }}</strong> </small></p>
                       

                        <small class="text-muted"> {{$blog->description}} </small>
                        <a href="{{ route('blogs.read', $blog->id) }}" class="btn btn-outline-primary btn-sm btn-block text-uppercase">Читать</a>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted far fa-calendar-alt"> {{ $blog->created_at->format("d.m.Y") }}</small>
                                                
                        
                        <span class="text-right text-secondary float-right">
                            <i class="far fa-eye" style="font-size:14px;"> 
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





   
    

@endsection