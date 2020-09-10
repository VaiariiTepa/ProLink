<?php

namespace App\Http\Controllers;

use App\Professional;
use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    // RECUPERATION ADRESSE D UN PROFESSIONEL
    public function getAdressesOfProfessional(Professional $professional)
    {
        return('welcome');
    }


    // CREATION ADRESSE
    public function nwaddress (Address $address)
    {
        // les variables qui permettent a l admin d enregistrer une nouvelle addresse
        $addressName=$_POST['address_name'];
        $longitude=$_POST['lon'];
        $latitude=$_POST['lat'];

        // enregistrement des donnes dans la table addresses
        $address->address_name=$addressName;
        $address->lon=$longitude;
        $address->lat=$latitude;

        $address->save();

        // recuperation id de l adresse
        $adressID=$address->address_id;

        return back();

    }

}
