@extends('layouts.product-details-layout')

@section('content')
    <div class="product-details"><!--product-details-->
       
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{$product->image}}" alt=""/>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information py-0" style = "text-align:center;border:5px solid gray"><!--/product-information-->
                    <h1 style = "color:blue;font-style: italic;font-size:40px;margin-left:-20px">{{$product->name}}</h1>
                    <br>
                    <div style = "text-align:left; padding-left:10em">
                    <p><b>Loại: </b> {{$product->category}}</p>
                    <p><b>Shop: </b>{{$product->flower_shop_name}}</p>
                    <p><b>Địa chỉ: </b> {{$product->address}}</p>
                   
                    <p><b>Liên lạc: </b> +34{{$product->phone}}</p>
                    @if($product->size == 1)
                    <p><b>Cỡ: </b> Nhỏ</p>
                    @endif
                    @if($product->size == 2)
                    <p><b>Cỡ: </b> Vừa</p>
                    @endif
                    @if($product->size == 3)
                    <p><b>Cỡ: </b> Lớn</p>
                    @endif
                    </div>
                    <span>
                        <span style = "margin-left:-20px;font-size:25px;"> Giá:${{$product->price}}</span>
                    </span>
                    <div class="star">    
                    <div id="vote-stars-result">
                    <b>Tỉ lệ vote: <i>(Tổng số vote: {{$product->count_rates}} votes, Tỉ lệ vote trung bình: {{$product->stars_rate}})</i></b>
                    </div>
                    <div id ="div-star">
                    </div>
                        @for($i=0;$i<5;$i++)
                            @if($i<$product->stars_rate)
                            <span class="fa fa-star fa-2x" style = "color:orange;"></span>
                            @else
                            <span class="fa fa-star fa-2x"></span>
                            @endif

                        @endfor
                        

                    </div>
                    
                </div><!--/product-information-->
               
            </div>
       
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
            </ul>
        </div>
        <div class="row">
                <div  style = "float:left;font-style:italic">
                <h3> Đánh giá: </h3> 
                </div>
                <div style = "padding-top:10px;margin-top:75px">
                @include('product-details.ratting-stars')
                <!-- @include('product-details.ratting-stars') -->
                @if($user != null && $user->is_admin == 1)
                    <div>
                        <a class="btn btn-primary btn-block pull-right"
                        href={{url()->current()."/edit"}}>Edit</a>
                    </div>
                @endif</div>             
                </div>
                <br><br>
        @if($list_articles != null)
            @foreach($list_articles as $article)
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="reviews">
                        <div class="col-sm-12">
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>{{$article->user_name}}</a>
                                </li>
                                <li><a href=""><i class="fa fa-clock-o"></i>{{$article->created_at}}</a></li>
                            </ul>
                            <a href={{url()->current()."/articles/".$article->id}}>{{$article->content}}</a>
                        </div>
                    </div>
                    @endforeach
                   
                    <!-- Button trigger modal -->
                    <button type="button"  class="btn btn-primary btn-lg pull-left" data-toggle="modal" data-target="#exampleModalScrollable">
                        Add Reviews
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Add a review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                      
                
                        <form action="{{route('create_new_article',$product->id)}}" method = "POST" id = "review" class = "login-form">
                             {{ csrf_field() }}
                            <input type="hidden" id="id" name="custId" value="{{$product->id}}">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-7">
                                <input type="text"  class="form-control" name="user" form = "review" placeholder="Enter your name" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Review</label>
                                <div class="col-sm-10">
                                <textarea class="textarea_article" name="review" placeholder="Reviews" required="true" form="review"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">Add Review</button>
                            </div>
                           
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @elseif($list_articles == null)
                    <div>
                        <h3>No Reviews For this product. Please add Reviews the product at here!!!</h3>
                        <button type="button"  class="btn btn-primary btn-lg pull-left" data-toggle="modal" data-target="#exampleModalScrollable">
                        Add Reviews
                    </button>
                    </div>
                @endif


    </div><!--/category-tab-->
    </div>
@endsection
