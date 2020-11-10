@extends('layouts.product-details-layout')

@section('content')
    <div class="product-details"><!--product-details-->
       
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{$product->image}}" alt=""/>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information py-0"><!--/product-information-->
                    <h2>{{$product->name}}</h2>
                    <span>
                        <span>Price: ${{$product->price}}</span>
                    </span>
                    <p><b>Shop:</b>{{$product->flower_shop_name}}</p>
                    <p><b>Address:</b> {{$product->address}}</p>
                    <p><b>Category:</b> {{$product->category}}</p>
                    <p><b>Contact:</b> +34{{$product->phone}}</p>
                </div><!--/product-information-->
                <div class="row">

                    <div id="vote-stars-result">
                    <b>Vote Rate: <i>(Total Rate: {{$product->count_rates}} votes, rate
                                average: {{$product->stars_rate}})</i></b>
                    </div>
                    @include('product-details.ratting-stars')
                    <!-- @include('product-details.ratting-stars') -->
                    @if($user != null && $user->is_admin == 1)
                        <div>
                            <a class="btn btn-primary btn-block pull-right"
                               href={{url()->current()."/edit"}}>Edit</a>
                        </div>
                    @endif
                </div>
            </div>
       
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
            </ul>
        </div>
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
