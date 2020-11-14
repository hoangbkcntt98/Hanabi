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
                    <p><b>Cỡ: </b> Small</p>
                    @endif
                    @if($product->size == 2)
                    <p><b>Cỡ: </b> Medium</p>
                    @endif
                    @if($product->size == 3)
                    <p><b>Cỡ: </b> Large</p>
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
                                <li><a href=""><i class="fa fa-calendar-o"></i>{{$article->updated_at}}</a></li>
                            </ul>
                            <a href={{url()->current()."/articles/".$article->id}}>{{$article->content}}</a>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{url()->current()."/create_article"}}">
                            <button type="button" class="btn btn-primary btn-lg pull-right">
                                Add Reviews
                            </button>
                    </a>
                </div>
                @elseif($list_articles == null)
                    <div>
                        <h3>No Reviews For this product. Please add Reviews the product at here!!!</h3>
                        <a href="{{url()->current()."/create_article"}}">
                            <button type="button" class="btn btn-primary btn-lg pull-right">
                                Add Reviews
                            </button>
                        </a>
                    </div>
                @endif


    </div><!--/category-tab-->
    </div>
@endsection
