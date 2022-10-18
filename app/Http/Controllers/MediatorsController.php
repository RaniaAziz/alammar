<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Mediator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class MediatorsController extends Controller
{

    public function index()
    {
        $title="الوسطاء ";
        meta_data($title, $title, ['' => $title]);
        return view('mediators.index');
    }

    public function data()
    {
        $items = new Mediator();

        if(request()->has('filter')) {
            $filter = json_decode(request('filter'));
            $items = $items->where(function($query) use($filter){
                if($filter->name){
                    $clients=Client::where('name', 'LIKE', "%$filter->name%")->pluck('id')->toArray();
                    $query->whereIn('client_id',$clients);

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
        $title=" إضافة وسيط";
        meta_data($title, $title, ['' => $title]);
        $clients=Client::all();
        return view('mediators.form',compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
        ]);

        DB::transaction(function () use($request) {

             Mediator::create([
                'client_id' => $request->client_id,
                'city' => $request->city,
                'neighborhood' => $request->neighborhood,
                'specialty' => $request->specialty,
                'job' => $request->job,
                'employer' => $request->employer,
                'details' => $request->details,
                'file' => $request->file,

            ]);
        });

        return response()->json(['message' => 'تم الحفظ بنجاح']);
    }

    public function edit(Mediator $item)
    {
        $title=" تعديل بيانات وسيط";
        meta_data($title, $title, ['' => $title]);
        $clients=Client::all();
        $item=$item->with('client')->where('id',$item->id)->first();
        return view('mediators.form',compact('clients','item'));
    }

    public function show(Mediator $item)
    {
        $title=" عرض  بيانات الوسيط";
        meta_data($title, $title, ['' => $title]);
        $item=$item->with('client')->where('id',$item->id)->first();
        return view('mediators.show', compact('item'));
    }

    public function update(Mediator $item, Request $request)
    {


        $request->validate([
            'client_id' => 'required',
        ]);

        DB::transaction(function() use($item, $request) {

            $item->client_id =  $request->client_id;
            $item->city = $request->city;
            $item->neighborhood = $request->neighborhood;
            $item->specialty = $request->specialty;
            $item->job = $request->job;
            $item->employer = $request->employer;
            $item->details = $request->details;
            $item->file = $request->file;
            $item->save();

        });

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    public function destroy(Mediator $item)
    {
            $item->delete();
            return response()->json(['message' =>'تم الحذف بنجاح']);

    }
}
