<h1>Panier</h1>

@foreach ($cart as $carts)
<ul>

    <li>
        Id du produits :
        {{$carts->produit_id}}
    </li>
    <li>
        Quantite :
        {{$carts->quantite}}

    </li>
    <li>
        Prix :
        {{$carts->price}}€

    </li>
</ul>
@endforeach