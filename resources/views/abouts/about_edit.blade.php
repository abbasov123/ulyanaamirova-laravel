@extends('layouts.app')


@section("content")

@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>ERRORS </strong> Были некоторые проблемы с вашим вкладом (There were some problems with your input).<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
@endif


<div class="container">
    

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center shadow">
                <div class="card-header text-danger text-uppercase"><h3><b>INFO ABOUT ME :)</b></h3></div>


                <div class="card-body text-center text-info">
                    <form action="{{ route('about.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="name"><h6>Name and surname </h6></label>
                        <input type="text" name="name" value="{{ $about->name }}"  class="form-control" placeholder="Name and surname">
                        

                        <label for="about"><h6>About me</h6></label>
                        <!-- <input type="text" name="about" value="{{ $about->about }}"> -->
                        <textarea name="about" id="mytextarea" cols="60" rows="10" class="form-control" placeholder="About me (Обо мне)"> </textarea>

                        <label for="email"><h6>My email</h6></label>
                        <input type="text" name="email" value="{{ $about->email }}"  class="form-control" placeholder="My email">
                        

                        <label for=""></label>
                        <label for="about image" class="form-control border-0 text-secondary">Upload profile picture (Don't forget)</label>
                        <input type="file" name="profile_img" class="form-control" value="">
                        

                        <label for="link"></label>
                        <input type="text" name="inst" value="{{ $about->inst }}"  class="form-control" placeholder="My instagram account link">
                        <input type="text" name="vk" value="{{ $about->vk }}"  class="form-control" placeholder="My vk account link">
                        <input type="text" name="litnet" value="{{ $about->litnet }}"  class="form-control" placeholder="My litnet account link">
                        
                        
                        <label for="" class="form-control border-0"></label>
                        <div class="text-right">
                        
                            <a href="{{ route('main.admin') }}" class="btn btn-danger">Cancel</a>
                            <input type="submit" name="submit" value="Update Profile" class="btn btn-success">

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




    
@endsection