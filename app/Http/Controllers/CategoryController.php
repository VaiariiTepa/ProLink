<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    // AFFICHE LA RESULTAT RECHERCHE
    public function research()
    {
        $subcategoryId = $_GET['subcategoryID'];
        // $categoryName=$_GET['category_name'];

        // on recupere les donnees de la table categories
        $get_pro = DB::table('professionals')

            ->join('sub_categories', 'professionals.subcategory_id', '=', 'sub_categories.id')

            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')

            ->select('categories.*','sub_categories.*','sub_categories.id','professionals.*')

            ->where('professionals.subcategory_id','=', $subcategoryId)

        ->get();


        return json_encode($get_pro);


    }

    // CREATION CATEGORIE
    public function nwcategory(Category $category)
    {
        // enregistrement du nom de la categorie
        $categoryName=$_POST['nom'];

        // enregistrement des donnes dans la table categories
        $category->name_category=$categoryName;

        $category->save();

        // recuperation id de la categorie
        $categoryId=$category->category_id;


        return back();
    }




}

