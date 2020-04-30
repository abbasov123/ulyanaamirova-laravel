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
                <div class="card-header text-info text-uppercase"><h3><b>Write a new blog</b></h3></div>


                <div class="card-body text-center text-secondary">
                    <form action="{{ route('blogs.publish') }}" method ="POST" enctype="multipart/form-data">

                        @csrf

                        <!-- <label for="heading"><h4>Title</h4></label> -->
                        <input type="text" name="title" class="form-control" placeholder="Title">

                        <label for="genre"></label>
                        <input type="text" name="genre" class="form-control" placeholder="Write the category/genre that best describes your blog (В тексте есть : )">

                        <label for="description"></label>
                        <input type="text" name="description" class="form-control" placeholder="Write the short description about the blog(You can pass this field)">
                        
                        <label for=""></label>
                        <label for="blog image" class="form-control border-0 text-secondary">Upload blog images (Ulyana use Ctrl + click to choose multiple images)</label>
                        <input type="file" name="blog_imgs[]" class="form-control" multiple>
                        
                        
                        <label for=""class="form-control border-0"></label>
                        <label for="blog image" class="form-control border-0 text-secondary">Write the main story</label>
                        <textarea name="story" id="mytextarea" cols="60" rows="10" class="form-control" placeholder="Story"> </textarea>


                        <label for="" class="form-control border-0"></label>
                        <div class="text-right">
                        
                            <a href="{{ route('main.admin') }}" class="btn btn-danger">CANCEL</a>
                            <input type="submit" name="submit" value="SHARE" class="btn btn-success">
                        
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection