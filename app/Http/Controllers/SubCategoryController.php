<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use App\Professional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    // RECUPERE TOUTES LES SOUS CATEGORIE D UNE CATEGORIE
    public function getSubcategoriesOfCategory()
    {
        // recupere id de la sous categorie choisie
        $categoryId=$_GET['categoryID'];
        // var_dump($categoryId);
        // on recupere les données dans la table subcategories selon la categorie
        $resultGetSubcategoriesOfCategory=DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('sub_categories.category_id', 'categories.name_category', 'sub_categories.id', 'sub_categories.name_subcategory')
            ->where('sub_categories.category_id', '=', $categoryId)
            ->get();

            return json_encode($resultGetSubcategoriesOfCategory);

            // select categories.category_id, categories.name_category, sub_categories.name_subcategory
            // from sub_categories
            // join categories
            // on sub_categories.category_id = categories.category_id
            // where sub_categories.category_id='1';

    }


    // CREATION SOUS CATEGORIE
    public function nwSpecialiter(SubCategory $subcategory){
        $specialiter = $_POST['specialiter'];
        $category_id = $_POST['category_id'];

        $subcategory->category_id = $category_id;
        $subcategory->name_subcategory = $specialiter;
        $subcategory->save();

        return back();

    }


}
