<?php

use App\Category;
use App\SubCategory;
use App\Address;
use App\Professional;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin', function () {
    $category = Category::all();
    $specialiter = SubCategory::all();
    $professional = Professional::all();

    // dump($category);
    return view('create',compact('category','specialiter'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//// CATEGORIES
Route::post('create_category', 'CategoryController@nwcategory')->name('create_category');
Route::post('delete','CategoryController@nwdelete')->name('delete');
Route::get('home/category','CategoryController@showCategories')->name('category');
Route::get('home/research_ajax','CategoryController@research');

//// SUBCATEGORIES
Route::post('create_specialiter','SubCategoryController@nwSpecialiter')->name('create_specialiter');
Route::get('home/get_subcategory','SubCategoryController@getSubcategoriesOfCategory');

//// PROFESSIONNEL
Route::post('create_pro','ProfessionalController@nwPro')->name('create_pro');

//// RDV
Route::post('create_rdv','RdvsController@nwRdv')->name('create_rdv');

