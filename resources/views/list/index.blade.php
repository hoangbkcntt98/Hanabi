@extends('layouts.master')

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if($products->count() > 0)
            @foreach ($products->chunk(4) as $items)
                <div class="row">
                    @foreach ($items as $product)
                        <div class="col-md-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{ url('product-details', [$product->id]) }}"><img src="{{$product->image}}" width = '215px' height= "215px" alt="product" class="product-img"></a>
                                        <a href="{{ url('product-details', [$product->id]) }}"><h3>{{ $product->name }}</h3> </a>
                                        <div class="star">
                                        @for($i=0;$i<5;$i++)
                                            @if($i<$product->stars_rate)
                                            <span class="fa fa-star" style = "color:orange;"></span>
                                            @else
                                        <span class="fa fa-star"></span>
                                        @endif
                                            
                                        @endfor
    
                                            <!-- <div> -->
                                           
                                        
                                        </div>
                                        <h2 style = "color:orange"> ${{$product->price}}</h2>
                                           
                                    </div> <!-- end caption -->
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <a href="{{ url('product-details', [$product->id]) }}">
                                                <p><b>Name:</b>{{$product->name}}</p>
                                                <p><b>Category:</b> {{$product->category}}</p>
                                                <!-- <div class="star">
                                                    <img src="layouts/images/home/star.png" width = "20px" height = "20px" alt="" class="star-rating">
                                                </div> -->
                                                <br>
                                                <p><b>Shop:</b> {{$product->flower_shop_name}}</p>
                                                <p><b>Price:</b> {{$product->price}}</p>
                                                
                                              
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- product-image-wrapper -->
                        </div> <!-- end col-md-3 -->
                    @endforeach
                </div> <!-- end row -->
            @endforeach
            {{$products->render()}}
        @else
                    <div class="text-center">
                        <h3>No result!!!</h3>
                    </div>
        @endif

    </div> <!-- end container -->


@endsection
