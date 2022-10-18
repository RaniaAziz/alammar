<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\SystemNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class SystemNoteController extends Controller
{

    public function index()
    {
        $title="ملاحظات النظام";
        meta_data($title, $title, ['' => $title]);
        return view('notes.index');
    }

    public function data()
    {
        $items = new SystemNote();

        if(request()->has('filter')) {
            $filter = json_decode(request('filter'));
            $items = $items->where(function($query) use($filter){

            });
        }
        if(request()->has('sort')) {
            $sort = json_decode(request('sort'), true);
            $fieldName = $sort['fieldName'] && strlen($sort['fieldName']) ? $sort['fieldName'] : 'id';
            $order = $sort['order'] && strlen($sort['order']) ? $sort['order'] : 'desc';
            $items = $items->orderBy($fieldName, $order);
        }

        $items = $items->with('order','user')->paginate(PER_PAGE);

        return response()->json(compact('items'));
    }

    public function create()
    {
        $title=" إضافة ملاحظة ";
        $orders=Order::with('client')->get()->map(function ($m){
        return [
            'id'=> $m->id,
            'name'=> $m->order_no .' - '. $m->client->name,

        ] ;
    });
        meta_data($title, $title, ['' => $title]);
        return view('notes.form',compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
//            'order_id' => 'required',
        ]);


        DB::transaction(function () use($request) {

             SystemNote::create([
                'order_id' => $request->order_id,
                'offer_id' => $request->offer_id,
                'type'     => $request->type,
                'notes'    => $request->notes,
                'user_id' => auth()->user()->id,

            ]);
        });

        return response()->json(['message' => 'تم الحفظ بنجاح']);
    }

    public function edit(SystemNote $item)
    {
        $title=" تعديل  ملاحظة";
        $orders=Order::with('client')->get()->map(function ($m){
            return [
                'id'=> $m->id,
                'name'=> $m->order_no .' - '. $m->client->name,

            ] ;
        });
        $item=$item->with('order','user')->where('id',$item->id)->first();
        meta_data($title, $title, ['' => $title]);
        return view('notes.form', compact('item','orders'));
    }

    public function show(SystemNote $item)
    {
        $title=" عرض  ملاحظة";
        $item=$item->with('order','user')->where('id',$item->id)->first();
        meta_data($title, $title, ['' => $title]);
        return view('notes.show', compact('item'));
    }

    public function update(SystemNote $item, Request $request)
    {


        DB::transaction(function() use($item, $request) {

            $item->order_id =  $request->order_id;
            $item->notes = $request->notes;
            $item->user_id  = auth()->user()->id;

            $item->save();

        });

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    public function destroy(SystemNote $item)
    {
            $item->delete();
            return response()->json(['message' =>'تم الحذف بنجاح']);

    }
}
