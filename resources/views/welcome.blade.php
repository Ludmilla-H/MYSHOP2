@extends('layouts.myshop')
@section('main')

        <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
            @forelse ($products as $itemProduct)
            <x-produc.card :itemProduct='$itemProduct'/>
    
            @empty
                NO PRODUCT
            @endforelse

        </div>
        {{$products->links()}}

@endsection
