<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\SubCategory;
use App\Professional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // affiche les categories
        $category=Category::all();

        // recupere les sous_categorie de la categorie qui est égale à la categorie
        $subcategory = SubCategory::all();

        // affiche les professionnels de la sous categories choisis
        $professional=Professional::all();

        //recupere les adresses des professionnels
        // $adress=Address::getAdressesOfProfessional($professional);



        // // recupere le id de la sous categories
        // $subcategoryId=$subcategory->subcategory_id;

        //Je récupère toutes les données dans ma table Categorie
            //J'affecte category::all()
            //Dans ma variable $category

            // $subcategory=SubCategory::all();
            // $professional=Professional::all();

        if (Auth::user()->user_type_id == 2) {
            # code...
            return view('entreprise',compact('category','subcategory','professional'));
        }else{
            return view('home',compact('category','subcategory','professional'));
        }


    }
}
