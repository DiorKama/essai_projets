<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    //
    public function index()
    {
        $user = User::get();
        $produit = Produit::get();
        return view('Produit.index', compact('produit', 'user'));
    }
    
    public function create()
    {
        $user = User::get();
        return view('Produit.ajout', compact('user'));
    }


    public function store(Request $request)
    {
       
        $produit = new Produit;
        $produit->nomProduit = $request->input('nomProduit');
        $user_id = Auth::id();
        $produit->user_id = $user_id ;
        
        $produit->save() ;
      
        return redirect('produits');
    }
}
