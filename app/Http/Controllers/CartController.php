<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {


    public function index() {

        $categories = Categorie::orderBy('name' , 'asc')->get() ;

        $cart = Cart::where('user_id' , Auth::user()->id )->get() ;
        $somme = 0 ;
        foreach($cart as $itemCart) {
            $somme =($itemCart->quantite * $itemCart->price)+$somme ;
        }

        return view ('cart' , compact('cart' , 'somme' , 'categories'))  ;
    }



    public function add(Produit $product) {
    
        /*
        si $_GET('quantite') est déclaré dans l'url dans la quantite 
        inséré en base prend sa valeur
        (quantite qui provient de l'URL)
        */
        $quantite = 1;
        if (isset($_GET['quantity'])) {
            $quantite = $_GET['quantity'];
            # code...
        };
    



        /* Vérifier l'existence du produit dans le panier
       ** SELECT * FROM CART WHERE User_id = "?" AND Product_id = $product->id->limit(0 , 1) ;
       */
        $cart = Cart::where('user_id' , Auth::user()->id)
                    ->where('produit_id' , $product->id) 
                    ->first() ;


        if (isset($cart)) {
        //met a jour la quantité du produit qui portent cette identifiant

        //UPDATE  CART SET quantite = 4 WHERE ID = 2 

            Cart::where('id' , $cart->id)->update([
                "quantite" => $quantite ,
            ]) ;
        
        } else {
            
        //SELECT * FROM CART WHERE user_id = 10 AND product_id = 5

        //penser a controler l'existence du produit
        Cart::create([  "user_id" => Auth::user()->id , 
        "produit_id" => $product->id ,
        "quantite" => $quantite ,
        "price" => $product->price ,
        ]);
        }
        return redirect()->back() ;
    
    }

    public function checkout() {

        $categories = Categorie::orderBy('name' , 'asc')->get() ;
        $cart = Cart::where('user_id' , Auth::user()->id )->get() ;
        $somme = 0 ;
        foreach($cart as $itemCart) {
            $somme =($itemCart->quantite * $itemCart->price)+$somme ;
        }


        return view('checkout' , compact('categories' , 'cart' , 'somme')) ;
    }

    public function delete($id) {

        $cart = Cart::findOrFail ($id);
        $cart->delete();

        return redirect(route('cart'));

        # code...
    }


        # code..
}
