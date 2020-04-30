@extends('layouts.app')


@section("content")

@if(session("about")) 
<div class="alert alert-success"> 

    <div>{{ session("about") }}</div>
    

</div>
@endif

<div class="container text-secondary">
    <div class="row justify-content-left">
        <div class="col-md-12">
        <span class="card-p-3">

            <div class="card border-0" style="max-width: 800px;">
                <div class="row no-gutters">
                    <div class="col-md-5 bg-transparent">

                        <img src="storage/about/{{$about->profile_img}}" class="card-img-top w-100 img-thumbnail shadow" alt="...">

                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h4 class="card-title">{{ $about->name }}</h4>
                        
                            
                            <p class="card-text"> {!! $about->about !!} </p>
                            
                        </div>

                        <div class="card-footer bg-transparent">


                            
                            <div class="text-left">
                                
                                <p class="far fa-envelope text-info"> {{ $about->email }} </p>
                                
                                <h4>
                                    <a class="fab fa-instagram text-info" href="{{ $about->inst }}" style='font-size:24px'></a>

                                    <a class="fab fa-vk text-info" href="{{ $about->vk }}" style='font-size:24px'></a>

                                    <a class="fas fa-book text-info" href="{{ $about->litnet }}" style='font-size:20px'></a>
                                </h4>
                                
                                

                            </div>
                              
                            @guest

                            @else
                                <label for="" class="form-control border-0"></label>
                                <a href="{{ route('about.edit') }}" class="btn btn-outline-danger">Редактировать</a>

                            @endguest


                        </div>

                    </div>
                    </div>
                </div>
                

            </div>
        </span>
  
    </div>

</div>

    


@endsection