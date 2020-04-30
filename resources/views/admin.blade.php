@extends('layouts.app')

@section("content")

<div class="container center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center text-uppercase shadow">
                <div class="card-header text-secondary">
                    <h2 class="outline-info"><b>Admin Panel</b></h2>        
                </div>

               
                <div class="card-body">
                    <div>
                        <a href="{{ route('blogs.write') }}" class="btn btn-primary">Write a new blog</a>
                    </div>

                    <label for=""></label>
                    <div>
                        <a href="{{ route('about.edit') }}" class="btn btn-danger">Edit and add info about yourself</a>
                    </div>

                    <label for=""></label>
                    <div>
                        <a href="{{ route('books.write') }}" class="btn btn-success">Publish a new book</a>
                    </div>
                    
                </div>
                

            </div>
        </div>
    </div>
</div>

@endsection