<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Offer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class ClientsController extends Controller
{

    public function index()
    {
        $title="العملاء";
        meta_data($title, $title, ['' => $title]);
        return view('clients.index');
    }

    public function data()
    {

        $items = new Client();
        if(request()->has('filter')) {
            $filter = json_decode(request('filter'));
            $items = $items->where(function($query) use($filter){
                if($filter->name){
                    $query->where('name', 'LIKE', "%$filter->name%");

                }
                if($filter->mobile){
                    $query->where('mobile', $filter->mobile)->orWhere('tel', $filter->mobile);

                }
                if($filter->email){
                    $query->where('email', 'LIKE', "%$filter->email%");

                }
            });
        }
        if(request()->has('sort')) {
            $sort = json_decode(request('sort'), true);
            $fieldName = $sort['fieldName'] && strlen($sort['fieldName']) ? $sort['fieldName'] : 'id';
            $order = $sort['order'] && strlen($sort['order']) ? $sort['order'] : 'desc';
            $items = $items->orderBy($fieldName, $order);
        }

        $items = $items->with('order','offer')->paginate(PER_PAGE);
        $data=$items->getCollection();
        $data= collect($data)->map(function ($q){
            $q->count_order=$q->order->count();
            $q->count_offer=$q->offer->count();

            return $q;
        });
        $items->setCollection($data);

        return response()->json(compact('items'));
    }

    public function create()
    {
        $title=" إضافة عميل";
        meta_data($title, $title, ['' => $title]);
        return view('clients.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'ID_no' => 'required',
        ]);

        DB::transaction(function () use($request) {

             Client::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'tel' => $request->tel,
                'ID_no' => $request->ID_no,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'job' => $request->job,
                'details' => $request->details,
                'file' => $request->image,

            ]);


        });

        return response()->json(['message' => 'تم الحفظ بنجاح']);
    }

    public function edit(Client $item)
    {
        $title=" تعديل بيانات عميل";
        meta_data($title, $title, ['' => $title]);
        return view('clients.form', compact('item'));
    }

    public function show(Client $item)
    {
        $title=" عرض بيانات عميل";
        meta_data($title, $title, ['' => $title]);
        return view('clients.show', compact('item'));
    }

    public function update(Client $item, Request $request)
    {


        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'ID_no' => 'required',
        ]);

        DB::transaction(function() use($item, $request) {

            $item->name = $request->name;
            $item->mobile = $request->mobile;
            $item->tel  = $request->tel;
            $item->ID_no = $request->ID_no;
            $item->email = $request->email;
            $item->company_name = $request->company_name;
            $item->job = $request->job;
            $item->file = $request->image;
            $item->details = $request->details;

            $item->save();

        });

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    public function destroy(Client $item)
    {

            $item->delete();
           return response()->json(['message' =>'تم الحذف بنجاح']);


    }

    public function orders($client_id)
    {

        $items = Order::where('client_id',$client_id);
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

        $items = $items->with('client')->paginate(PER_PAGE);

        return response()->json(compact('items'));
    }

    public function offers($client_id)
    {

        $items =Offer::where('client_id',$client_id);
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

        $items = $items->with('client','poster')->paginate(PER_PAGE);
        return response()->json(compact('items'));
    }
}
