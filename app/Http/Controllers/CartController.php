<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {


    public function index() {

        $cart = Cart::where('user_id' , Auth::user()->id )->get() ;

        return view ('cart' , compact('cart'))  ;
    }



    public function add(Produit $product) {
    
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
                "quantite" => $cart->quantite+1 ,
            ]) ;
        
        } else {
            
        //SELECT * FROM CART WHERE user_id = 10 AND product_id = 5

        //penser a controler l'existence du produit
        Cart::create([  "user_id" => Auth::user()->id , 
        "produit_id" => $product->id ,
        "quantite" => 1 ,
        "price" => $product->price ,
        ]);
        }
        return redirect (route('cart')) ;
    
    }

    public function cart() {


    }

    

    public function delete($id)
    {
        # code...
    }

    //
}
