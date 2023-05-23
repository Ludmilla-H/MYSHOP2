<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index($categorie = 0) {

        //lister tout les produits
        $products = Produit::orderBy('created_at' , 'desc')->paginate(8) ;

        if ($categorie != 0 ) {
        $products = Produit::where('categorie_id' , $categorie)->orderBy('created_at' , 'desc' )->paginate(10) ;
        }

        $categories = Categorie::orderBy('name' , 'asc')->get() ;
    
        return view('welcome' , compact('products' , 'categories')) ;
        
    }

    //afficher le detail du produits mais aussi les produits similaires
    public function detail(Produit $product) {
        

    // dd($product->category_id) ;
    //selectionner les produits qui ont la même categorie que ce produit

        $products = Produit::where('categorie_id' , $product->categorie_id)->orderBy('created_at' , 'desc' )->inRandomOrder()->limit(4)->get() ;
        $categories = Categorie::orderBy('name' , 'asc')->get() ;

    return view ('detail' , compact ('product' , 'products' , 'categories')) ;

    }

    //Recoit la méthode a ajouter

    /* Ajouter au cadi ,
    ** Vérifier la disponibilités et les quantités
    */


    
}
