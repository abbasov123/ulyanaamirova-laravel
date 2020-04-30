@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">

@section('content')

@if(count($errors) > 0)
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
            <div class="card shadow text-secondary text-center">
                <div class="card-header text-uppercase text-success"><h3><b>Publish a new book</b></h3></div>


                <div class="card-body text-center">
                <form action="{{ route('books.publish') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <label for="book name"></label>
                    <input type="text" name="book_name" class="form-control" placeholder="The name of the book">

                    <label for="genre"></label>
                    <input type="text" name="genre" class="form-control" placeholder="Write the category that best describes your book (В тексте есть :) ">
                    
                    <label for="description"></label>
                    <input type="text" name="description" class="form-control" placeholder="Write the short description about the book (You can pass this field)">
                    <label for=""></label>

                    <label for="book img"></label>
                    <label for="book image" class="form-control border-0 text-secondary">Upload the image of the book (Don't forget, only one image)</label>
                    <input type="file" name="book_img" class="form-control">
                    

                    <table class="table">

                        <thead class="text-info">
                            

                            <th>HEADING</th>

                            <th>STORY</th>

                            <th><a href="#" class="btn btn-primary addRow">+</a></th>
                        </thead>

                        <tbody>
                            <tr>

                                <td> <textarea name="headings[]" id="" cols="40" rows="2" class="form-control" placeholder="Heading"> </textarea></td>
                                <td> <textarea name="stories[]" id="" cols="60" rows="10" class="form-control" placeholder="Story"> </textarea></td>
                                
                                <td><a href="#" class="btn btn-danger remove">-</a></td>

                            </tr>
                        </tbody>

                        <tfoot class="">
                            <tr>
                                <td><a href="{{ route('main.admin') }}" class="btn btn-danger">CANCEL</a></td>
                                <td></td>
                                <td>
                                
                                    <input type="submit" value="PUBLISH" class="btn btn-success">

                                </td>
                            </tr>


                        </tfoot>

              
                    </table>
                  

                </form> 
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">

    $('.addRow').on('click',function(){

        addRow();

    });

    function addRow(){
        var tr = '<tr>' +
        '<td> <textarea name="headings[]" id="" cols="40" rows="2" class="form-control" placeholder="Heading"> </textarea></td>' +
        '<td> <textarea name="stories[]" id="" cols="60" rows="10" class="form-control" placeholder="Story"> </textarea></td>' +
        '<td><a href="#" class="btn btn-danger remove">-</a></td>' +
        '</tr>';

        $("tbody").append(tr);
    }


    $(".remove").live("click",function(){

        $(this).parent().parent().remove();

    });



</script>





@endsection
