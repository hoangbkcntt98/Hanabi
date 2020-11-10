@extends('layouts.product-details-layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="{{asset('css/article.css')}}" rel="stylesheet">

@section('content')
    <div class="card">
        <div class="card-header title">Create New Review</div>

        <div class="card-body login-wrap">
            <form enctype="multipart/form-data" method="post" >
                {{ csrf_field() }}
                
                <div>
                    <textarea class="textarea_article" name="title" placeholder="Name" required="true"></textarea>
                    <br>
                    <textarea class="textarea_article" name="description" placeholder="Title" required="true"></textarea>
                    <br>
                    <textarea class="textarea_article content" name="text" placeholder="Content" required="true"></textarea>
                </div>
                <div class="center_button">
                    <button type="submit" class = "btn btn-primary btn-sm" id="submit-button" name="product_id" value={{$product_id}}>Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
@endsection
