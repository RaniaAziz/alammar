<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Order;
use App\Models\SystemNote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class OrdersController extends Controller
{

    public function index()
    {
        $title="الطلبات العقارية";
        meta_data($title, $title, ['' => $title]);
        return view('orders.index');
    }

    public function data()
    {
        $items = new Order();

        if(request()->has('filter')) {
            $filter = json_decode(request('filter'));
            $items = $items->where(function($query) use($filter){
                if($filter->order_no){
                    $query->where('order_no',$filter->order_no);

                }
                if($filter->real_estate_type){
                    $query->where('real_estate_type',$filter->real_estate_type);

                }

                if($filter->status){
                    $query->where('status',$filter->status);

                }
              if($filter->space_from){
                    $query->where('space_from',$filter->space_from);

                }
                if($filter->space_to){
                    $query->where('space_to',$filter->space_to);

                }
                if($filter->price_from){
                    $query->where('price_from',$filter->price_from);

                }
                if($filter->price_to){
                    $query->where('price_to',$filter->price_to);

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

        $items = $items->with('client')->paginate(PER_PAGE);

        return response()->json(compact('items'));
    }

    public function create()
    {
        $title=" إضافة طلب عقاري";
        meta_data($title, $title, ['' => $title]);
        $clients=Client::all();
        $users=User::all();
        return view('orders.form',compact('clients','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'order_type' => 'required',
            'real_estate_type' => 'required',
        ]);

        DB::transaction(function () use($request) {

             Order::create([
                 'order_no'=>rand(100,9999),
                'client_id' => $request->client_id,
                'order_type' => $request->order_type,
                'real_estate_type' => $request->real_estate_type,
                'city' => $request->city,
                'neighborhood' => $request->neighborhood,
                'space_from' => $request->space_from,
                'space_to' => $request->space_to,
                'price_from' => $request->price_from,
                'price_to' => $request->price_to,
                'details' => $request->details,
                'status' => 'new',
                'user_id' => $request->user_id,

            ]);
        });

        return response()->json(['message' => 'تم الحفظ بنجاح']);
    }

    public function edit(Order $item)
    {
        $title=" تعديل  طلب عقاري";
        meta_data($title, $title, ['' => $title]);
        $clients=Client::all();
        $users=User::all();
        $item=$item->with('client','user')->where('id',$item->id)->first();
        return view('orders.form',compact('clients','item','users'));
    }

    public function show(Order $item)
    {
        $title=" عرض  طلب عقاري";
        meta_data($title, $title, ['' => $title]);
        $item=$item->with('client')->where('id',$item->id)->first();
        $item_notes=SystemNote::with('user')->where('order_id',$item->id)->get();
        return view('orders.show', compact('item','item_notes'));
    }

    public function update(Order $item, Request $request)
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
            $item->space_from = $request->space_from;
            $item->space_to = $request->space_to;
            $item->price_from = $request->price_from;
            $item->price_to = $request->price_to;
            $item->details = $request->details;
            $item->user_id = $request->user_id;
            $item->save();

        });

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    public function destroy(Order $item)
    {
            $item->delete();
            return response()->json(['message' =>'تم الحذف بنجاح']);

    }

    public function changeStatus(Request $request)
    {

       $order=Order::where('id',$request->order_id)->first();
       $order->status=$request->status;
       $order->save();


    }
}
