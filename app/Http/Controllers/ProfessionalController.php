<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use App\Category;
use App\SubCategory;

use App\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ProfessionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


// recupere les professionels d une sous categorie
    public function getProfessionalsOfSubcategory(SubCategory $subcategory)
    {

    }


   // public function nwprofessional(Info $info, Infocategorie $infocategorie)
   public function nwPro(Request $request, Professional $professional, Address $adress)
   {
       // les variables qui permettent a l admin d enregistrer un nouveau professionel
        $name_company = $_POST['name_entreprise'];
        $name_contact = $_POST['name_gerant'];
        $status_juridique = $_POST['status_juridique'];
        $number_rc = $_POST['numero_rc'];
        $number_tahiti = $_POST['numero_tahiti'];
        $number_phone = $_POST['phone'];
        $mail = $_POST['email'];
        $password = $_POST['password'];
        $price = $_POST['tarif'];
        $adresse = $_POST['adresse'];
        $city = $_POST['city'];
        $lon = $_POST['lon'];
        $lat = $_POST['lat'];

        //récupération ID subcategory
        $subcategory_id = $_POST['subcategory_id'];

        //traitement du logo
        $name_file = $request->file('img')->getClientOriginalName();
        $files = $request->file('img');
        $files->move('uploads/',$name_file);


        // Get user ID
        $user_id = Auth::user();

        // professional
        $professional->name_company = $name_company;
        $professional->img = $name_file;
        $professional->name_contact = $name_contact;
        $professional->status_juridique = $status_juridique;
        $professional->number_rc = $number_rc;
        $professional->number_tahiti = $number_tahiti;
        $professional->number_phone = $number_phone;
        $professional->mail = $mail;
        $professional->subcategory_id = $subcategory_id;
        $professional->price = $price;
        $professional->user_id = $user_id->id;
        // $professional_id = $professional->id;
        $professional->address = $adresse;
        $professional->city = $city;
        $professional->lon = $lon;
        $professional->lat = $lat;
        $professional->save();
        // $adress->professionnal_id = $professional_id;
        // $adress->save();

        User::create([
            'name' => $name_contact,
            'email' => $mail,
            'user_type_id' => 2,
            'password' => Hash::make($password),
        ]);

        return back();

    }


}


