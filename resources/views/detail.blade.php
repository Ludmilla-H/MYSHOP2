@extends('layouts.myshop')
@section('main')

<div class="row">
    <div class="col">
        <ul class="breadcrumb breadcrumb-style-2 d-block text-4 mb-4">
            <li><a href="#" class="text-color-default text-color-hover-primary text-decoration-none">Home</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-5 mb-5 mb-md-0">

        <div class="thumb-gallery-wrapper">
            <div class=" manual nav-inside nav-style-1 nav-dark mb-3">
                <div>
                    <img alt="" class="img-fluid" src="{{Storage::url($product->image)}}" 
                    data-zoom-image="">
                </div>
                
            </div>
            
        </div>

    </div>

    <div class="col-md-7">

        <div class="summary entry-summary position-relative">

            <div class="position-absolute top-0 right-0">
                <div class="products-navigation d-flex">
                    <a href="#" class="prev text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-original-title="Red Ladies Handbag"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="next text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-original-title="Green Ladies Handbag"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>

            <h1 class="mb-0 font-weight-bold text-7">{{ $product->name }}</h1>

            <div class="pb-0 clearfix d-flex align-items-center">
                <div title="Rated 3 out of 5" class="float-start">
                    <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                </div>

            </div>

            <div class="divider divider-small">
                <hr class="bg-color-grey-scale-4">
            </div>

            <p class="price mb-3">
                <span class="sale text-color-dark">{{ $product->price }}€</span>
            </p>

            <p class="text-3-5 mb-3">{{$product->description}}</p>

            <ul class="list list-unstyled text-2">
                <li class="mb-0">AVAILABILITY: <strong class="text-color-dark">AVAILABLE</strong></li>
            </ul>
            <form method="get" action="{{route('addToCart' ,$product )}}">

                <hr>
                    <div class="quantity float-none m-0 mb-3">
                        <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                        <input type="text" class="input-text qty text" title="Qty" id="{{$product->produit_id}}" value="1" name="quantity" min="1" step="1">
                        <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" data-id="{{$product->produit_id}}" value="+" value="+">
                    </div>
                <hr>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">Ajouter au panier</a>
                        
                    </div>
            </form>
    

        <div class="row">
            <div class="col">
                <h4 class="font-weight-semibold text-4 mb-3">PRODUIT SIMILAIRE</h4>
                <hr class="mt-0">
                @foreach ($products as $product)

                <li>{{$product->name}}</li>
            
            </ul>
            
            @endforeach

            </div>
        </div>
            

        </div>

    </div>
</div>


@endsection

