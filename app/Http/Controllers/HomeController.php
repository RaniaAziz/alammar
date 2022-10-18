<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Poster;
use Illuminate\Http\Request;

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

        $title="رئيسية التحكم ";
        meta_data($title, $title, ['' => $title]);

        $of_no=Offer::count();
        $c_no=Client::count();
        $or_no=Order::count();
        $p_no=Poster::count();
        return view('main',compact('c_no','of_no','or_no','p_no'));
    }

    function upload(Request $request) {

        $image=saveMultipleSizeImage($request->file,'uploads');
        return Response()->json(compact('image'));

        // return $image;
    }
}
