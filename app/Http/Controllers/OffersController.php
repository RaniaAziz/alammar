<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Offer;
use App\Models\Poster;
use App\Models\SystemNote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class OffersController extends Controller
{

    public function index()
    {
        $title="العروض العقارية";
        meta_data($title, $title, ['' => $title]);
        return view('offers.index');
    }

    public function data()
    {
        $items = new Offer();

        if(request()->has('filter')) {
            $filter = json_decode(request('filter'));
            $items = $items->where(function($query) use($filter){
                if($filter->offer_no){
                    $query->where('offer_no',$filter->offer_no);

                }
                if($filter->real_estate_type){
                    $query->where('real_estate_type',$filter->real_estate_type);

                }

                if($filter->status){
                    $query->where('status',$filter->status);

                }
              if($filter->space){
                    $query->where('space',$filter->space);

                }

                if($filter->price){
                    $query->where('price',$filter->price);
                }
                if($filter->city){
                    $query->where('city', 'LIKE', "%$filter->city%");

                }
                if($filter->neighborhood){
                    $query->where('neighborhood', 'LIKE', "%$filter->neighborhood%");

                }

            });
        }
        if(request()->has('sort')) {
            $sort = json_decode(request('sort'), true);
            $fieldName = $sort['fieldName'] && strlen($sort['fieldName']) ? $sort['fieldName'] : 'id';
            $order = $sort['order'] && strlen($sort['order']) ? $sort['order'] : 'desc';
            $items = $items->orderBy($fieldName, $order);
        }

        $items = $items->with('client','poster')->paginate(PER_PAGE);

        return response()->json(compact('items'));
    }

    public function create()
    {
        $title=" إضافة عرض عقاري";
        meta_data($title, $title, ['' => $title]);
        $clients=Client::all();
        $posters=Poster::all();
        $users=User::all();
        return view('offers.form',compact('clients','posters','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'order_type' => 'required',
            'real_estate_type' => 'required',
        ]);

        DB::transaction(function () use($request) {

             Offer::create([
                 'offer_no'=>rand(100,9999),
                'client_id' => $request->client_id,
                'order_type' => $request->order_type,
                'real_estate_type' => $request->real_estate_type,
                'city' => $request->city,
                'neighborhood' => $request->neighborhood,
                'space' => $request->space,
                'price' => $request->price,
                'soum' => $request->soum,
                'limit' => $request->limit,
                'no_planned' => $request->no_planned,
                'no_piece' => $request->no_piece,
                'mediator' => $request->mediator,
                'poster_id' => $request->poster_id,
                'details' => $request->details,
                'instrument_image' => $request->instrument_image,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'status' => 'new',
                 'user_id'=>$request->user_id,

            ]);
        });

        return response()->json(['message' => 'تم الحفظ بنجاح']);
    }

    public function edit(Offer $item)
    {
        $title=" تعديل  عرض عقاري";
        meta_data($title, $title, ['' => $title]);
        $clients=Client::all();
        $posters=Poster::all();
        $users=User::all();
        $item=$item->with('client','poster','user')->where('id',$item->id)->first();
        return view('offers.form',compact('clients','posters','item','users'));
    }

    public function show(Offer $item)
    {
        $title=" عرض  العرض عقاري";
        meta_data($title, $title, ['' => $title]);
        $item=$item->with('client','poster')->where('id',$item->id)->first();
        $item_notes=SystemNote::with('user')->where('offer_id',$item->id)->get();

        return view('offers.show', compact('item','item_notes'));
    }

    public function update(Offer $item, Request $request)
    {

        $request->validate([
            'client_id' => 'required',
            'order_type' => 'required',
            'real_estate_type' => 'required',
        ]);

        DB::transaction(function() use($item, $request) {

            $item->client_id =  $request->client_id;
            $item->order_type = $request->order_type;
            $item->real_estate_type  = $request->real_estate_type;
            $item->city = $request->city;
            $item->neighborhood = $request->neighborhood;
            $item->space = $request->space;
            $item->soum = $request->soum;
            $item->price = $request->price;
            $item->limit = $request->limit;
            $item->no_planned = $request->no_planned;
            $item->no_piece = $request->no_piece;
            $item->mediator = $request->mediator;
            $item->poster_id = $request->poster_id;
            $item->details = $request->details;
            $item->instrument_image = $request->instrument_image;
            $item->lng = $request->lng;
            $item->lat = $request->lat;
            $item->user_id = $request->user_id;
            $item->save();

        });

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    public function destroy(Offer $item)
    {
            $item->delete();
            return response()->json(['message' =>'تم الحذف بنجاح']);

    }

    public function changeStatus(Request $request)
    {

        $order=Offer::where('id',$request->order_id)->first();
        $order->status=$request->status;
        $order->save();


    }
}
