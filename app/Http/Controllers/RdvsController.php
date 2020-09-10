<?php

namespace App\Http\Controllers;

use App\rdvs;
use Illuminate\Http\Request;

class RdvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nwRdv()
    {
        // $professional_id = ;
        $professional_id = $_POST['professonal_id'];
        $professional_id = $_POST['rdv_type_id'];
        $professional_id = $_POST['date'];
        $professional_id = $_POST['description'];
    }

}
