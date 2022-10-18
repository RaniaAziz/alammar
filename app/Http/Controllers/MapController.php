<?php

namespace App\Http\Controllers;


use App\Models\Offer;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public function index()
    {

        $title=" الخريطة التفاعلية ";
        meta_data($title, $title, ['' => $title]);
        $offers_data=Offer::with('client')->get();

        return view('map.index',compact('offers_data'));
    }
}
